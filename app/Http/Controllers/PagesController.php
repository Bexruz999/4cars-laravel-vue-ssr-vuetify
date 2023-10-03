<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Page;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class PagesController extends Controller
{
    public function delivery(Request $request) {

        if ($request->ajax() || $request->isJson()) {
            $page = Page::where('slug', $request->path())->where('status', 'ACTIVE')->first();
            $page->image = Voyager::image($page->image);
            $data['view'] = view('pages.delivery')->render();
            $data['page'] = $page;
            return response()->json($data, 200);
        }
        else{
            return view('layout', ['page' => 'delivery']);
        }
    }

    public function news(Request $request) {

        if ($request->ajax() || $request->isJson()) {
            $page = Page::where('slug', $request->path())->where('status', 'ACTIVE')->first();
            $page->image = Voyager::image($page->image);
            $data['view'] = view('pages.news')->render();
            $data['page'] = $page;
            return response()->json($data, 200);
        }
        else{
            return view('layout', ['page' => 'news']);
        }
    }

    public function contacts(Request $request) {

        if ($request->ajax() || $request->isJson()) {
            $page = Page::where('slug', $request->path())->where('status', 'ACTIVE')->first();
            $page->image = Voyager::image($page->image);
            $data['view'] = view('pages.contacts')->render();
            $data['page'] = $page;
            return response()->json($data, 200);
        }
        else{
            return view('layout', ['page' => 'contacts']);
        }
    }

    public function shinomontazh(Request $request) {

        if ($request->ajax() || $request->isJson()) {
            $page = Page::where('slug', $request->path())->where('status', 'ACTIVE')->first();
            $page->image = Voyager::image($page->image);
            $data['view'] = view('pages.shinomontazh')->render();
            $data['page'] = $page;
            return response()->json($data, 200);
        }
        else{
            return view('layout', ['page' => 'shinomontazh']);
        }
    }
}
