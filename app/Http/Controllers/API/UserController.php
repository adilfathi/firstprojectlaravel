<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //fungsilogin
    public function login (Request $request){

    try{
        //input
        $request->validate([
            'email' => 'email|required',
            'password'=> 'required'
        ]);

        //cek
        $credentials = $request (['email','password']);
        if(!Auth::attempt($credentials)){
            return ResponseFormatter::error([
                'message'=> 'Unauthorized'
            ], 'Authentication Failed',500);
        }

        //jika error

        $user = User::where('email',$request->email)->first();
        if (!Hash::check($request->password, $user->password,[])){
            throw new\Exeption('Invalid Credentials');
        }

        //jika sukses

        $tokenResult = $user -> createToken('authToken')->plainTextToken;
        return ResponseFormatter::success([
            'access_token' => $tokenResult,
            'token_type'=>'Bearer',
            'user'=>$user
        ], 'Authenticated');
    } catch(Exception $error){
        return responseFormatter::$error([
            'message' => 'keknya ada yang salah',
            'error' => $error
        ],'Authentication Failed',500);

    }

    }
}
