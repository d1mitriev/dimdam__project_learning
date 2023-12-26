<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MeController extends Controller {
    public function index(Request $request) {
        $data = $request->all();

        $email = $data['email'] ?? null;

        if (!$email) {
            return response()->json([
                'error' => 'Please provide both email and password'
            ], 400);
        }

        // Retrieve the user based on the provided email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        // Login successful
        return response()->json([
            'message' => 'Logged in successfully',
            'user' => $user // You can return the user details if needed
        ], 200);
    }
}
