<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {


        $data = view('pages.home')->render();

        if ($request->ajax() || $request->isJson()) {
            return response()->json($data, 200);
        }
        else{
            return view('layout', ['page' => 'home']);
        }
    }

    public function test(Request $request) {
        $posts = '<p>test</p>';
        if ($request->ajax() || $request->isJson()) {
            return response()->json($posts, 200);
        }
    }
}
