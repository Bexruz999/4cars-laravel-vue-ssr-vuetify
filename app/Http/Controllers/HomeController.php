<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class HomeController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax() || $request->isJson()) {

            $page = Page::where('slug', $request->path())->where('status', 'ACTIVE')->first();
            $page->image = Voyager::image($page->image);
            $data['view'] = view('pages.home')->render();
            $data['page'] = $page;

            return response()->json($data, 200);

        }

        return view('layout', ['page' => 'home']);
    }
}
