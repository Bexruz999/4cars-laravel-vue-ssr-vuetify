<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Page;
use App\Models\Product;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SearchController extends Controller
{

    public function updateTire(Request $request) {
        $diameters = [];
        foreach ($request->diameters as $key => $diameter) {
            if($diameter){
                $diameters[] = str_replace('R', '', $key) ;
            }
        }
        $seasons = [];
        foreach ($request->seasons as $key2 => $season) {
            if($season){
                $seasons[] = $key2;
            }
        }
        $test = Product::select(['diametr_shin', 'sezony', 'Price', 'shirina_shin', 'vysota_shin'])
            ->whereIn('diametr_shin', $diameters)
            ->whereIn('sezony', $seasons)
            ->where('Price', '>', 0)
            ->where('shirina_shin', '!=', null)
            ->where('vysota_shin', '!=', null)
            ->distinct()->get();
        dd($key, $diameters, $seasons, $test);
        $diameters = Arr::get($request, 'diameters');
        $seasons = Arr::get($request, 'seasons');
        $attributes = Attribute::where('')->get();
        return response()->json($request);
    }
    public function getSizesTire(Request $request) {
        $attributes = Attribute::select(['value', 'id', 'type'])->whereIn('type', ['Ширина шин', 'Высота шин'])->get();

        $width = $attributes->where('type', 'Ширина шин')->pluck('value');
        $height = $attributes->where('type', 'Высота шин')->pluck('value');
        return response()->json(['width' => $width, 'height' => $height]);
    }

}
