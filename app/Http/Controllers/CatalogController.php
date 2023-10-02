<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Page;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class CatalogController extends Controller
{
    public function tires(Request $request) {

        if ($request->ajax() || $request->isJson()) {
            $page = Page::where('slug', $request->path())->where('status', 'ACTIVE')->first();
            $page->image = Voyager::image($page->image);
            $data['view'] = view('pages.tires')->render();
            $data['page'] = $page;
            return response()->json($data, 200);
        }
        else{
            return view('layout', ['page' => 'tires']);
        }
    }
}
