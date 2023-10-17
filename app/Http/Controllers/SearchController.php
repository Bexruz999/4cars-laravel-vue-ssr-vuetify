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

        $data = $this->getData($request);

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

        $data = $this->getData($request, ['Name', 'Price', 'Id']);

        return response()->json($data->select(['Name', 'Price', 'Id'])->paginate(15, '', '', ''), 200);
    }

    private function getData($request, $addSelect = []) {

        $data = Product::select(['diametr_shin', 'sezony', 'shirina_shin', 'vysota_shin']);

        $diameters = [];
        foreach ($request->diameters as $key => $diameter) {
            if($diameter){ $diameters[] = str_replace('R', '', $key) ; }
        }

        $seasons = [];
        foreach ($request->seasons as $key2 => $season) {
            if($season){ $seasons[] = $key2; }
        }

        if (count($addSelect)) $data->addSelect($addSelect);
        if (count($diameters)) $data->whereIn('diametr_shin', $diameters);
        if (count($seasons)) $data->whereIn('sezony', $seasons);
        if ($request->width !== 'Выбрать') $data->where('shirina_shin', $request->width);
        if ($request->height !== 'Выбрать') $data->where('vysota_shin', $request->height);

        $data->where('shirina_shin', '!=', null)
            ->where('vysota_shin', '!=', null)
            ->where('Price', '>', 0);

        return $data;
    }
}
