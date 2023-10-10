<?php

namespace App\Services;

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
}
