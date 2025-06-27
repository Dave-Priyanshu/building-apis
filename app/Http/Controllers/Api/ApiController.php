<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    // Register APi - name,email,password,password_confirm
    public function register(Request $request){
        $request->validate([
            "name" => "required|string",
            "email"=> "required|email|unique:users,email",
            "password" => "required|string|confirmed"
        ]);

        User::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'User Registered successfully'
        ]);
    }

    // login Api
    public function login(){

    }

    // profile Api
    public function profile(){
    
    }

    // logout Api
    public function logout(){
    
    }
}
