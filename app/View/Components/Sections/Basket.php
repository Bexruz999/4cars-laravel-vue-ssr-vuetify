<?php

namespace App\View\Components\Sections;

use App\Models\Product;
use Illuminate\View\Component;

class Basket extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $basket = session()->get('basket', []);
        $products_keys = array_keys($basket);
        $products = Product::select(['Id', 'Name', 'Price'])->whereIn('Id', $products_keys)->get();
        $price = array_sum($products->pluck('Price')->all());
        return view('components.sections.basket', [
            'nds'       => round($price - $price/(1+12/100), 2),
            'products'  => $products,
            'basket'    => $basket,
            'price'     => $price,
            'delivery'  => 0
        ]);
    }
}
