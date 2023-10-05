<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = $request->validated();

        if ($request->ajax() || $request->isJson()) {
            return response()->json($data, 200);
        } else {
            return view('auth.signin');
        }
    }
}
