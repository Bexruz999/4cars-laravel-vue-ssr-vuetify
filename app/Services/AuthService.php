<?php

namespace App\Services;


use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function login($data) {

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back();
        }

        auth()->login($user);

        if (session()->has('redirectTo')) {
            $url = session()->get('redirectTo');
            session()->forget('redirectTo');
            return response()->json($url, 200);
        }

        return redirect('/user/profile');
    }

    public function register($data) {
        $data['password'] = Hash::make($data['password']);
        unset($data['confirm']);
        $user = User::query()->create($data);
        $user->save();

        auth()->login($user);
        return redirect('/user/profile');
    }
}
