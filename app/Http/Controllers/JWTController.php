<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class JWTController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['login']]);
    }
   
    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|string|email',
            'password'=>'required|string|min:8'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            if(!$token=auth()->attempt($validator->validated())){
               return response()->json(['error'=>'Invalid email or password'],401);
            }
            return $this->respondWithToken($token);
        }
    }
    public function logout(){
        auth()->logout();
        return response()->json(["message"=>"User Logout Successfully"]);
    }
    public function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->factory()->getTTL()*60
        ]);
    }
    public function profile(){
        $arr=["dipali"];
        return response()->json($arr);
    }
    public function refresh(){
        return $this->responseWithToken(auth()->refresh());
    }
}

