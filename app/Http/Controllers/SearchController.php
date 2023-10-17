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

    public function updateTireSizes(Request $request) {

        $req = $this->getData($request);

        $diameters = $req['diameters'];

        $seasons = $req['seasons'];

        $data = Product::select(['diametr_shin', 'sezony', 'shirina_shin', 'vysota_shin']);

        if (count($diameters)) $data->whereIn('diametr_shin', $diameters);
        if (count($seasons)) $data->whereIn('sezony', $seasons);

        $data->where('shirina_shin', '!=', null)
            ->where('vysota_shin', '!=', null)
            ->distinct()->get();

        $shirina_shin = [];
        foreach ($data->pluck('shirina_shin', 'shirina_shin') as $shirina) {
            $shirina_shin[] = $shirina;
        }

        $vysota_shin = [];
        foreach ($data->pluck('vysota_shin', 'vysota_shin') as $vysota) {
            $vysota_shin[] = $vysota;
        }

        return response()->json(['height' => $vysota_shin, 'width' => $shirina_shin]);
    }

    public function getTireSizes(Request $request) {
        $attributes = Attribute::select(['value', 'id', 'type'])->whereIn('type', ['Ширина шин', 'Высота шин'])->get();

        $width = $attributes->where('type', 'Ширина шин')->pluck('value');
        $height = $attributes->where('type', 'Высота шин')->pluck('value');
        return response()->json(['width' => $width, 'height' => $height]);
    }

    public function getTires(Request $request) {

        $req = $this->getData($request);

        $data = Product::select(['diametr_shin', 'sezony', 'shirina_shin', 'vysota_shin', 'Name', 'Price', 'Id']);

        if (count($req['diameters'])) $data->whereIn('diametr_shin', $req['diameters']);
        if (count($req['seasons'])) $data->whereIn('sezony', $req['seasons']);
        if ($req['width'] !== 'Выбрать') $data->where('shirina_shin', $req['width']);
        if ($req['height'] !== 'Выбрать') $data->where('vysota_shin', $req['height']);

        $data->where('shirina_shin', '!=', null)
            ->where('vysota_shin', '!=', null)
            ->where('Price', '>', 0);

        return response()->json($data->select(['Name', 'Price', 'Id'])->get(), 200);
    }

    private function getData($request) {

        $diameters = [];
        foreach ($request->diameters as $key => $diameter) {
            if($diameter){ $diameters[] = str_replace('R', '', $key) ; }
        }

        $seasons = [];
        foreach ($request->seasons as $key2 => $season) {
            if($season){ $seasons[] = $key2; }
        }

        return ['diameters'=> $diameters, 'seasons' => $seasons, 'width' => $request->width, 'height' => $request->height];
    }
}
