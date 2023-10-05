<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        if ($request->ajax() || $request->isJson()) {
            return response()->json(['true'], 200);
        } else {
            return view('auth.signup');
        }
    }

    public function login(Request $request)
    {
        if ($request->ajax() || $request->isJson()) {
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            $user = User::where('email', $data['email'])->first();

            if (!$user || !Hash::check($data['password'], $user->password)) {
                return response()->json($data, 401);
            }

            return response()->json($data, 200);
        } else {
            return view('auth.signin');
        }
    }
}
