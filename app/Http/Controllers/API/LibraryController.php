<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Library::create([
            'account_no' => $request->account_no,
            'mat_no' => $request->mat_no,
            'return_date'=>$request->return_date,
            'status'=> 0
        ]);
        

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $info = Library::where('mat_no', $request->mat_no)->get();
        return response(
            $info
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            $library =  Library::where('mat_no', $request->mat_no)->where('id', $request->id)->update([
                'status'=>1,
            ]);
            return Library::where('mat_no', $request->mat_no)->where('id', $request->id)->get();
    }
}
