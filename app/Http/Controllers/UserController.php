<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Facades\Voyager;

class UserController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
    }

    public function register(Request $request)
    {

        if ($request->has('email')) {

            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirm' => 'required|min:8'
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

    public function profile(Request $request, $slug) {
        $page = Page::where('slug', "user/$slug")->where('status', 'ACTIVE')->first();
        if ($page) {

            return view('auth.signup');

        }
        else {
            $page = Page::where('slug', '404')->where('status', 'ACTIVE')->first();

            return view('layout', ['page' => 404]);
        }
    }

    public function info() {

        $user = auth()->user();
        return response()->json($user, 200);
    }
}
