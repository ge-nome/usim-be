<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $intercept = $request->validate([
            'name'=>'required|string',
            'idnumber'=>'required|string',
            'password'=>'required|confirmed|string',
            'level'=>'required|string'
        ]);
        $create = User::create([
            'name'=>$intercept['name'],
            'level'=>$intercept['level'],
            'idnumber'=>$intercept['idnumber'],
            'password'=>bcrypt($intercept['password']),
            
        ]);
        $token = $create->createToken($intercept['idnumber'])->plainTextToken;
        return response([
            'message'=>200,
            'data'=>$create,
            'token'=>$token,
        ]);
    }

    public function login(Request $request){
        $intercept = $request->validate([
            'idnumber'=>'required|string',
            'password'=>'required|string'
        ]);

        $runcheck = User::where('idnumber', $intercept['idnumber'])->first();
        if(!$intercept['idnumber'] || !Hash::check($intercept['password'], $runcheck->password)){
            return response([
                'msg'=>'Incorrect username and password'
            ], 401);
        }
        else{
            $hashing = bcrypt($intercept['password']);
            $token = $runcheck->createToken($hashing)->plainTextToken;
            return response([
                'msg'=>'Login successful',
                'credentials'=>$runcheck,
                'token'=> $token
            ]);
        }
    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response([
            'message'=>'Logged out successfully'
        ]);
    }

    public function assign(Request $request){

        $intercept = $request->validate([
            'uniqueid'=>'required|string',
            'authlevel'=>'required|string'
        ]);

        $valid = User::where('uniqueid', $intercept['uniqueid'])->get();
        if(count($valid) == 0) return response(['msg'=>'invalid staff ID'], 401);
        $know = Author::where('uniqueid', $intercept['uniqueid'])->get();
        if(count($know)==0){
            return Author::create([
                'uniqueid'=>$intercept['uniqueid'],
                'authlevel'=>$intercept['authlevel'],
            ]);
        }
        else{
            $know[0]->update([
                'authlevel'=>$intercept['authlevel']
            ]);
            return response([
                'msg'=>'updated'
            ]);
        }

    }
}

