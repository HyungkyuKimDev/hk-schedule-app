<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    # Check Login
    public function login(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        if ($user->password !== $request->password) {
            return response()->json(['error' => 'Password is incorrect'], 401);
        }
        return response()->json(['message' => 'Login successful'], 200);
    }

    # Register
    public function register(Request $request)
    {
        $user = User::create([$request->id, $request->nickname, $request->password, $request->type]);
        # Already exists
        if ($user) {
            return response()->json(['error' => 'User already exists'], 400);
        }
        # Do not Fit in PW Rule
        if (strlen($request->password) < 8) {
            return response()->json(['error' => 'Password must be at least 8 characters long'], 400);
        }
        # Do not Fit in ID Rule
        if (strlen($request->id) < 8) {
            return response()->json(['error' => 'ID must be at least 8 characters long'], 400);
        }
        return response()->json(['message' => 'Register successful'], 200);
    }
}
