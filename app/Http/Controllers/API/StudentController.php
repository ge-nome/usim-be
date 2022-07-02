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
    public function index(Request $request  )
    {
        $student = Student::all()
        ->where('mat_no', 'like', "%{$request->mat_no}%");
        return response()->json([
            'status'=>200,
            'student'=>$student
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
            'surname'=>'required',
            'firstname'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'passport'=>'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $imageFile = $request->firstname.$request->surname.'.'.$request->passport->extension();

        $request->passport->move(public_path('storage/'), $imageFile);

        $student = Student::create([
            'surname'=>$request->input('surname'),
            'firstname'=>$request->input('firstname'),
            'othername'=>$request->input('othername'),
            'dob'=>$request->input('dob'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
            'school_id'=>$request->input('school_id'),
            'course_id'=>$request->input('course_id'),
            'level_id'=>$request->input('level_id'),
            'passport'=>$imageFile,
        ]);
        $student->save();

        return response()->json([
            'status'=>"Success",
            'message'=>"Registration Successful",
            'data'=>$student
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response()->json(Student::all(), 200);
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
        //
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
