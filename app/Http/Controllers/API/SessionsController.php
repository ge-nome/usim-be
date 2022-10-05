<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prev = Session::where('status', 0)->get();
        $now = Session::where('status', 1)->get();
        return response([
            'prev'=>$prev,
            'now'=>$now
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
        Session::where('status', 1)->update([
            'status'=>0
        ]);

        $sess = Session::create([
            'session'=>$request->session
        ]);
        
        return response()->json([
            $sess
        ]);
    }
}
