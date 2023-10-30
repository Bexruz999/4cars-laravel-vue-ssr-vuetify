<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Models;
use App\Models\Product;
use App\Models\ProductAtributMapping;
use App\Models\SpecificationAtributeOption;
use App\Models\SpecifitionAtribute;
use Illuminate\Support\Arr;
use Rap2hpoutre\FastExcel\FastExcel;

class UploadService
{

    public function upload() {

        $collection = (new FastExcel)->sheet(1)->import('E:\Programs\OSPanel\domains\4cars\Товары для сайта.xlsx');

        foreach ($collection as $item) {

            $product_name = Arr::get($item, 'value');
            $attribute_name = Arr::get($item, 'atribute_type');
            $option_value = Arr::get($item, 'atribute_value');
            $product = Product::where('Name', $product_name)->first();

            if ($product) {

                $attribute = SpecifitionAtribute::where('name', $attribute_name)->first();

                if (!$attribute) {
                    $attribute = new SpecifitionAtribute;
                    $attribute->name = $attribute_name;
                    $attribute->save();
                }

                $option = SpecificationAtributeOption::where('attribute_id', $attribute->id)->where('value', $option_value)->first();

                if (!$option) {
                    $option = new SpecificationAtributeOption;
                    $option->attribute_id = $attribute->id;
                    $option->value = $option_value;
                    $option->save();
                }

                $product_map = ProductAtributMapping::where('product_id', $product->Id)->where('atribut_id', $option->id)->first();

                if (!$product_map) {
                    $product_map = new ProductAtributMapping;
                    $product_map->product_id = $product->Id;
                    $product_map->atribut_id = $option->id;
                    $product_map->save();
                }
            }
        }
    }

    public function upload2() {

        $collection = (new FastExcel)->sheet(1)->import('E:\Programs\OSPanel\domains\4cars\Товары для сайта.xlsx');

        foreach ($collection as $key => $item) {

            $product_name = Arr::get($item, 'value');
            if (str_starts_with($product_name, 'Диски')) {
                $product_name = str_replace('Диски', 'Комплект дисков', $product_name);
                echo $key . $product_name . '\\n';
                $attribute_name = Arr::get($item, 'atribute_type');
                $option_value = Arr::get($item, 'atribute_value');
                $product = Product::where('Name', $product_name)->first();

                if ($product) {


                    switch (true) {

                        case ($attribute_name === 'Модели' || $attribute_name === 'Модели дисков') :

                            $this->addModel($product, $option_value);
                            break;

                        case ($attribute_name === 'Брэнды') :

                            $this->addBrand($product, $option_value);
                            break;

                        case ($attribute_name === 'Сезоны' || $attribute_name === 'Типы дисков') :

                            $product->sezony = $option_value;
                            break;

                        case ($attribute_name === 'Виды номенклатуры') :

                            $product->vidy_nomenklatury = $option_value;
                            break;

                        case ($attribute_name === 'НеПубликовать') :

                            $product->nepublikovat = $option_value;
                            break;

                        case ($attribute_name === 'RunFlat') :

                            $product->runflat = $option_value;
                            break;

                        case ($attribute_name === 'Усиленные') :

                            $product->usilennye = $option_value;
                            break;

                        case ($attribute_name === 'Шипы') :

                            $product->shipy = $option_value;
                            break;

                        default :

                            $this->addAttribute($product, $option_value, $attribute_name);
                            break;
                    }

                    $product->save();

                }
            }
        }
    }

    private function addModel($product, $value) {

        $model = Models::where('name', $value)->first();

        $product->modeli = $value;

        if (!$model) {

            $model = new Models;
            $model->name = $value;
            $model->type = 'disk';
            $model->save();

        }
    }

    private function addAttribute($product, $value, $type) {

        $product->razmery_shiny     = $type === 'Размеры шины' || $type === 'Размеры дисков' ? $value : null;
        $product->shirina_shin      = $type === 'Ширина шин'   || $type === 'Ширина дисков'  ? $value : null;
        $product->diametr_shin      = $type === 'Диаметр шин'  || $type === 'Диаметр дисков' ? $value : null;
        $product->vysota_shin       = $type === 'Высота шин'   || $type === 'Вылеты'         ? $value : null;
        $product->indeksy_skorosti  = $type === 'Индексы скорости'  ? $value : null;
        $product->indeksy_nagruzki  = $type === 'Индексы нагрузки'  ? $value : null;
        $product->otverstiya        = $type === 'Отверстия'         ? $value : null;
        $product->kolichestvo_boltov= $type === 'Количество болтов' ? $value : null;
        $product->rasstoyaniya      = $type === 'Расстояния'        ? $value : null;
        $product->cveta             = $type === 'Цвета'             ? $value : null;

        $attribute = Attribute::where('value', $value)->where('type', $type)->first();

        if (!$attribute) {

            $attribute = new Attribute;
            $attribute->type = $type;
            $attribute->value = $value;
            $attribute->save();

        }
    }

    private function addBrand($product, $value) {

        $product->brendy = $value;

        $brand = Brand::where('name', $value)->first();

        if (!$brand) {

            $brand = new Brand;
            $brand->name = $value;
            $brand->save();

        }
    }

    public function generate () {

        $products = Product::select(['Id', 'Name', 'shirina_shin', 'vysota_shin', 'diametr_shin', 'indeksy_nagruzki', 'indeksy_skorosti'])->get();

        $test = [];
        foreach ($products as $key => $product) {

            preg_match('#Шины (.*) \D*(\d+)/(\d+) R(\d+) \d+/(\d+)([\D]+)#', $product->Name, $data);
            if (!$data) {
                var_dump($product->Name);
                var_dump($data);
            } else {
                echo '+++'.$product->Name;
                $test[$key]['shirina_shin'] = $data[2];
                $test[$key]['vysota_shin'] = $data[3];
                $test[$key]['diametr_shin'] = $data[4];
                $test[$key]['indeksy_nagruzki'] = $data[5];
                $test[$key]['indeksy_skorosti'] = $data[6];
                $product->shirina_shin = $data[2];
                $product->vysota_shin = $data[3];
                $product->diametr_shin = $data[4];
                $product->indeksy_nagruzki = $data[5];
                $product->indeksy_skorosti = $data[6];
                $product->save();
            }
            //dd($test, $product);
        }
    }

    public function generate2 () {

        $products = Product::select(['Id', 'Name', 'shirina_shin', 'vysota_shin', 'diametr_shin', 'indeksy_nagruzki', 'indeksy_skorosti', 'ShortDescription'])
            ->where('vidy_nomenklatury', 'Диски')
            ->get();


        $test = [];
        foreach ($products as $key => $product) {

            $len = strlen($product->ShortDescription) > 15;
            $short = str_contains($product->ShortDescription, 'Зимняя шипованная шина') && $len;

            if ($short) {
                $product->ShortDescription = 'ДА';
                $product->save();
            }
        }
    }

    public function import () {
        function usersGenerator() {
            foreach (Product::cursor() as $product) {
                yield $product;
            }
        }

        (new FastExcel(usersGenerator()))->export('test.xlsx');
    }

    public function upload3() {
        $collection = (new FastExcel)->import('E:\Programs\OSPanel\domains\4cars\1111.xlsx');

        foreach ($collection as $item) {
            $product = Product::where('Name', $item['Name'])->first();
            if ($product) {
                $product->indeksy_nagruzki = $item['Indeksy nagruzki'];
                $product->vidy_nomenklatury = $item['Vidy nomenklatury'];
                $product->diametr_shin = $item['Diametr'];
                $product->indeksy_skorosti = $item['Indeksy skorosti'];
                $product->brendy = $item['Brendy'];
                $product->sezony = $item['Sezony'];
                $product->razmery_shiny = $item['Razmery shiny'];
                $product->shirina_shin = $item['Shirina'];
                $product->vysota_shin = $item['Vysota'];
                $product->modeli = $item['Modeli'];
            }
        }

        $a = $collection;
    }

}
