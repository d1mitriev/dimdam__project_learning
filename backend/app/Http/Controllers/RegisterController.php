<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    public function index(Request $request) {
        $data = $request->all();

        // Assuming the request contains a 'name' field
        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
        $gender = $data['gender'] ?? null;
        $activity = $data['activity'] ?? null;
        $birthday = $data['birthday'] ?? null;

        // if (!$name || !$email || !$password || !$gender || !$activity || !$birthday) {
        //     return response()->json([
        //         'error' => 'Please provide all required fields',
        //         'data' => $data
        //     ], 400);
        // }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->gender = $gender;
        $user->activity = $activity;
        $user->birthday = $birthday;

        $user->save();

        // Create a new user or perform registration logic here
        
        return response()->json([
            'message' => 'User registered successfully'
        ], 200);
    }
}
