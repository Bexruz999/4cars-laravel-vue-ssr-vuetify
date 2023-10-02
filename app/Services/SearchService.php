<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Http\Request;

class SearchService
{

    protected $ravBody;
    public $searchCount;

    public function __construct()
    {
        $this->ravBody = "MATCH(position_name) AGAINST(? IN BOOLEAN MODE)";
        $this->ravProducer = "MATCH(name) AGAINST(? IN BOOLEAN MODE)";
        $this->searchCount = setting('search_count', 10);
    }

    public function search(Request $request) {

        $query = $request->validate(['keywords' => 'required']);

        $products = $this->product($query['keywords']);


        $result = [];
        foreach ($products as $product) {
            //dd($product);
            $result[] = [
              'id' => $product->id,
              'name' => $product->position_name,
              'slug' => "/store/" . str_replace('https://satu.kz/', '', $product->group->link_group). "/".$product->id
            ];
        }

        return $result;
    }

    public function webSearch(string $q) {
        $qQuery = $this->searchQuery($q);
        $results = Product::with(['group'])->whereRaw($this->ravBody, $qQuery)->orderBy('position_name')->paginate($this->searchCount)->withQueryString();
        return $results;
    }

    private function product(string $q)
    {
        $qQuery = $this->searchQuery($q);
        $results = Product::select('id', 'group_id', 'position_name', 'group_number')->with([
            'group' => function ($query) {$query->select('link_group', 'number_group');}
        ])->whereRaw($this->ravBody, $qQuery)->orderBy('position_name')->take($this->searchCount)->get();
        return $results;
    }

    private function searchQuery($q)
    {
        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query);

        $query = [];
        foreach ($arr as $word) {
            $len = mb_strlen($word, 'UTF-8');
            switch (true) {
                case ($len <= 3):
                {
                    $query[] = $word . "*";
                    break;
                }
                case ($len > 3 && $len <= 6):
                {
                    $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                    break;
                }
                case ($len > 6 && $len <= 9):
                {
                    $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                    break;
                }
                case ($len > 9):
                {
                    $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                    break;
                }
                default:
                {
                    break;
                }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query);
        return $qQeury;
    }
}
