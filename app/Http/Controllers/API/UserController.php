<?php

namespace App\Http\Controllers\API;
use App\Actions\Fortify\PAsswordValidationRules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{

    use PasswordValidationRules;
    //fungsi login
    function login (Request $request) {
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
            } 
        catch(Exception $error){
            return responseFormatter::$error([
            'message' => 'keknya ada yang salah',
            'error' => $error
        ],'Authentication Failed',500);

        }
    
    //fungsiresgister
     function register (Request $request){

     }
        try {
            $request->validate([
                'name'=> ['required','string','max:255'],
                'email'=> ['required','string','max:255','unique:users'],
                'password'=>  $this->passwordRules()

            ]);

            User::create([
                'name' => $request ->name,
                'email' => $request ->email,
                'password' =>Hash::make($request -> password) ,
            ]);

            $user =User::where('email',$request->email)->first();
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token'=>$tokenResult,
                'token_type'=>'barrer',
                'user'=>$user,
            ]);
        } catch (Exception $error) {
            returnResponseFormatter:error([
                'message'=>'keknya ada yang salah',
                'erorr' => $error
            ],'Authentication Failed',500);
            //throw $th;
        }
    }
    //fungsilogin
     function logout(Request $request){
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::succes($token,'Token Revoked');
    }
    //fungsiupdateProfile
    function updateProfile(Request $request){
        $data = $request->all();
        $user = Auth::user();
        $user ->update($data);
        return ResponFormatter::success($user,'profile sudah di update');
    }
    //ngambil data
    public function fetch(Request $request){
        return ResponseFormatter::success(
            $request->user(),'data telah berhasih di ambil'
        );  
    }
    //updatephoto
    public function updatePhoto(Request $request){
        $validator = Validator::make($request->all(),[
            'file'=> 'required|image|2048'
        ]);
        if ($validator->fails()){
            return ResponseFormatter::error(
                ['error'=>$validator->error()],
                'update foto gagal',
                401
            );
        }
        if($request->file('file')){
            $file = $request->file->store('asset/user','public');

            //simpan foto ke database(url)
            $user= Auth::user();
            $user->profile_photo_path = $file;
            $user->update();

            return ResponseFormatter::success([$file],'file sukses di upload');
        }
    }

}

