<?php

namespace App\View\Components\Sections;

use App\Models\Product;
use Illuminate\View\Component;

class HomeHit extends Component
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

        $hits = Product::where('ShowOnHomepage', 1)->where('Price', '>', 0)->get();
        return view('components.sections.home-hit', ['hits' => $hits]);
    }
}
