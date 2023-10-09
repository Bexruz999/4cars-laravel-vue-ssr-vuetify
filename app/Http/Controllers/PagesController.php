<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class PagesController extends Controller
{

    public function page(Request $request, $slug) {

        $page = Page::where('slug', $slug)->where('status', 'ACTIVE')->first();

        if ($page) {

            if ($request->ajax() || $request->isJson()) {

                $page->image = Voyager::image($page->image);
                $data['view'] = view("pages.$slug")->render();
                $data['page'] = $page;

                return response()->json($data, 200);

            }

            return view('layout', ['page' => $slug]);
        }

        $page = Page::where('slug', '404')->where('status', 'ACTIVE')->first();

        if ($request->ajax() || $request->isJson()) {

            $page->image = Voyager::image($page->image);
            $data['view'] = '';
            $data['page'] = $page;

            return response()->json($data, 200);
        }

        else return view('layout', ['page' => 404]);
    }
}
