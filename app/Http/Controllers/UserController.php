<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserController extends Controller
{
    public function signUp(Request $request){
      $this->validate($request , [
         'email' => 'required|email|unique:users',
         'password' => 'required'
      ]);
      $user = new User([
        'name'=>$request->name,
        'email'=>$request->email,
        'password' => bcrypt($request->password)
      ]);
      $user->save();
      return response()->json(['message'=>'success'] , 201);
    }

    public function signIn(Request $request){
       $this->validate($request , [
         'email' => 'required',
         'password' => 'required'
      ]);
       $credentials = $request->only('email' , 'password');
       try{
         if (!$token = JWTAuth::attempt($credentials)) {
           return response()->json([
             'error' => 'invalid credentials'
           ] , 401);
         }
       }
       catch(JWTException $e){
         return response()->json([
             'error' => 'error'
           ] , 500);
       }
       return response()->json([
             'token' => $token
           ] , 200);
    }

}


















