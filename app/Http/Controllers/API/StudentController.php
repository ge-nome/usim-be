<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student = Student::all()
        ->where('mat_no', $request->mat_no);
        return response()->json([
            'status'=>200,
            'data'=>$student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'surname'=>'required|string',
            'firstname'=>'required|string',
            'department'=>'required|string',
            'school'=>'required|string',
            'course'=>'required|string',
            'level'=>'required|string',
            'school'=>'required',
            'passport'=>'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $imageFile = $request->firstname.$request->surname.'.'.$request->passport->extension();

        $request->passport->move(public_path('storage/'), $imageFile);

        $qr = trim(bcrypt($request->mat_no), "/");

        return $student = Student::create([
            'mat_no'=>$request['mat_no'],
            'surname'=>$request['surname'],
            'firstname'=>$request['firstname'],
            'department'=>$request['department'],
            'school'=>$request['school'],
            'course'=>$request['course'],
            'level'=>$request['level'],
            'qr_hash'=>$qr,
            'passport'=>$imageFile
        ]);
        $student->save();

        return response()->json(Student::all()
        ->where('mat_no', $request->mat_no));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Student::where('qr_hash', $request['qr_hash'])->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $get = Student::where('qr_hash', $request->qr_hash)->update([
            'mat_no'=>$request->mat_no,
            'surname'=>$request->surname,
            'firstname'=>$request->firstname,
            'department'=>$request->department,
            'school'=>$request->school,
            'course'=>$request->course,
            'level'=>$request->level
        ]);
        return $this->show($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function others(Request $request)
    {   
        // return $request->course;
        try {
            $dept = Department::where('id', $request->department)->get('department');       
            $lev = Level::where('id', $request->level)->get('level');       
            $sch = School::where('id', $request->school)->get('school');       
            $crs = Course::where('id', $request->course)->get('course');
    
            return response()->json([
                'depart' => $dept,
                'level' => $lev,
                'school' => $sch,
                'course' => $crs,
            ]); 
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'unable to collect data',
                'error' => $th,
            ]);
        }
    }
}
