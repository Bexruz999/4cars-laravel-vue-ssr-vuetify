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

        foreach ($collection as $item) {

            $product_name = Arr::get($item, 'value');
            $attribute_name = Arr::get($item, 'atribute_type');
            $option_value = Arr::get($item, 'atribute_value');
            $product = Product::where('Name', $product_name)->first();

            if ($product) {


                switch (true) {

                    case ($attribute_name === 'Модели') :

                        $this->addModel($product, $attribute_name);
                        break;

                    case ($attribute_name === 'Брэнды') :

                        $this->addBrand($product, $option_value);
                        break;

                    case ($attribute_name === 'Сезоны') :

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


            }
        }
    }

    private function addModel($product, $value) {

        $model = Models::where('name', $value)->first();

        $product->modeli = $value;

        if (!$model) {

            $model = new Models;
            $model->name = $value;
            $model->save();

        }
    }

    private function addAttribute($product, $value, $type) {

        $product->indeksy_skorosti  = $type === 'Индексы скорости'  ? $value : null;
        $product->indeksy_nagruzki  = $type === 'Индексы нагрузки'  ? $value : null;
        $product->razmery_shiny     = $type === 'Размеры шины'      ? $value : null;
        $product->shirina_shin      = $type === 'Ширина шин'        ? $value : null;
        $product->diametr_shin      = $type === 'Диаметр шин'       ? $value : null;
        $product->vysota_shin       = $type === 'Высота шин'        ? $value : null;

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

            $brand = new Attribute;
            $brand->name = $value;
            $brand->save();

        }
    }
}