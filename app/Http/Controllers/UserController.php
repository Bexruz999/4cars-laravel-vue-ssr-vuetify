<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
    }

    public function register(Request $request)
    {

        if ($request->has('email')) {

            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            return $this->authService->register($data);

        } else {

            return view('auth.signup');

        }
    }

    public function login(Request $request)
    {
        if ($request->has('email')) {

            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            return $this->authService->login($data);

        }

        return view('auth.signin');

    }
}
