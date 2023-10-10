<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAtributMapping;
use App\Models\SpecificationAtributeOption;
use App\Models\SpecifitionAtribute;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Rap2hpoutre\FastExcel\FastExcel;

class ExcellController extends Controller
{
    private $groupsName;

    private $manufacturersName;

    private $customFieldsName;

    public function import() {
        return view('excell.import');
    }

    public function upload(Request $request) {

        $validated = $request->validate(['file' => 'required']);

        $file = $validated['file'];

        $collection = (new FastExcel)->sheet(1)->import($file);

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

        /*$this->groupsName = Group::pluck('id', 'name')->all();
        $this->manufacturersName = Manufacturer::pluck('id', 'name')->all();
        $this->customFieldsName = CustomField::pluck('id', 'name')->all();*/

        return redirect()->back();
    }

    private function createProductMapping ($artibutes, $item) {
        $id = Arr::get($item, 'atribute_type');
        $value = Arr::get($item, 'atribute_value');
        $attr_id = $artibutes->where('Name', $id)->first();

        return $id;
    }

    private function createProduct($item) {
        $product = new Product;
        $product->group_id = $this->getGroupId($item['Название_группы']);
        $product->product_key = $item['Код_товара'];
        $product->position_name = $item['Название_позиции'];
        $product->search_querys = $item['Поисковые_запросы'];
        $product->description = $item['Описание'];
        $product->product_type = $item['Тип_товара'];
        $product->price = (int)$item['Цена'];
        $product->currency = $item['Валюта'];
        $product->unit = $item['Единица_измерения'];
        $product->moq = (int)$item['Минимальный_объем_заказа'];
        $product->trade_price = (int)$item['Оптовая_цена'];
        $product->trade_moq = (float)$item['Минимальный_заказ_опт'];
        $product->availability = ($item['Наличие'] === '+') ? true : false;
        $product->quantity = (int)$item['Количество'];
        $product->group_number = $item['Номер_группы'];
        $product->possibility_supply = ($item['Возможность_поставки'] === '+') ? true : false;
        $product->delivery_time = (int)$item['Срок_поставки'];
        $product->packing_method = $item['Способ_упаковки'];
        $product->unique_id = $item['Уникальный_идентификатор'];
        $product->item_id = (int)$item['Идентификатор_товара'];
        $product->subsection_id = $item['Идентификатор_подраздела'];
        $product->manufacturer_id = $this->getManufacturerId($item['Производитель']);
        $product->manufacturer_country = $item['Страна_производитель'];
        $product->discount = $item['Скидка'];
        $product->variety_group_id = (int)$item['ID_группы_разновидностей'];
        $product->personal_notes = $item['Личные_заметки'];
        $product->product_on_site = $item['Продукт_на_сайте'];
        $product->discount_from = (int)$item['Срок_действия_скидки_от'];
        $product->discount_to = (int)$item['Срок_действия_скидки_до'];
        $product->price_from = (int)$item['Цена_от'];
        $product->label = $item['Ярлык'];
        $product->html_header = $item['HTML_заголовок'];
        $product->html_description = $item['HTML_описание'];
        $product->html_keywords = $item['HTML_ключевые_слова'];
        $product->marcing_kode_gtin = $item['Код_маркировки_(GTIN)'];
        $product->device_Number_mpn = $item['Номер_устройства_(MPN)'];
        $product->image_link = $this->getProductImages($item);
        $product->save();
        $this->createProductFields($product->id, $item);
    }

    private function createProductFields($id, $params) {
        for ($i = 1; $i < 14; $i++) {

            $customName = Arr::get($params, "Название_Характеристики$i", false);
            $customFieldId = Arr::get($this->customFieldsName, $customName);

            if($customName && $customFieldId) {
                $field = new CustomFieldValue;
                $field->product_id = $id;
                $field->custom_field_id = $customFieldId;
                $field->value = Arr::get($params, "Значение_Характеристики$i");
                $field->save();
            }
        }
    }

    private function getProductImages($item) {
        $images = explode(',' ,$item['Ссылка_изображения']);
        return json_encode($images);
    }

    private function getGroupId($groupName) {
        return (array_key_exists($groupName, $this->groupsName)) ? $this->groupsName[$groupName] : null;
    }

    private function getManufacturerId($groupName) {
        return (array_key_exists($groupName, $this->manufacturersName)) ? $this->manufacturersName[$groupName] : null;
    }
}
