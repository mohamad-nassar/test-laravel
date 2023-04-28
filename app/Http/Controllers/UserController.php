<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $cred=$request->only(['email','password']);
        if( $token =Auth::attempt($cred)) return response()->json(['message'=>$token], 200);
        else return response()->json(['message'=>'error'], 400);
    }
    public function register(Request $request)
    {
        // $validator=Validator::make(
        //     $request->all(),
        //     [
        //         'name'=>'required',
        //         'email'=>'required|email|unique:users,email',
        //         'password'=>'required|min:8'
        //     ],
        //     [
        //         'name.required'=>'Please enter your name',
        //         'email.required'=>'Please enter your email',
        //         'email.email'=>'Please enter a valid email address',
        //     ]
        //     );
        //     if($validator->fails()) return response()->json(['message'=>$validator->errors()->first()], 400);
        User::create(
            [
                'name'=>'Moe',
                'email'=>'moe@gmail.com',
                'password'=>Hash::make('123')
            ]
            );
            return response()->json(['message'=>'created'], 200);
    }
}
