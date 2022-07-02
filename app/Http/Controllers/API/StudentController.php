<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        // $request->validate([
        //     'surname'=>'required',
        //     'firstname'=>'required',
        //     'email'=>'required|email',
        //     'phone'=>'required',
        //     'passport'=>'required|mimes:jpg,png,jpeg|max:5048',
        // ]);

        // $imageFile = $request->firstname.$request->surname.'.'.$request->passport->extension();

        // $request->passport->move(public_path('storage/'), $imageFile);

        $student = Student::create([
            'mat_no'=>$request->mat_no,
            'surname'=>$request->input('surname'),
            'firstname'=>$request->input('firstname'),
            'othername'=>$request->input('othername'),
            'dob'=>$request->input('dob'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
            'school_id'=>$request->input('school_id'),
            'course_id'=>$request->input('course_id'),
            'level_id'=>$request->input('level_id'),
            'passport'=>$request->passport,
        ]);
        $student->save();

        return response()->json(Student::all()->where('mat_no', $request->mat_no));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json(Student::all()->where('mat_no', $request->mat_no), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Student::where('qr_hash', $request->qr_hash)->update([
            'surname'=>$request->surname,
            'firstname'=>$request->firstname,
            'othername'=>$request->othername,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'school_id'=>$request->school_id,
            'course_id'=>$request->course_id,
            'level_id'=>$request->level_id,
        ]);
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
}
