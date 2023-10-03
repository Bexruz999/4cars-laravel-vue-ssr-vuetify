<?php

namespace App\View\Components\Sections;

use App\Models\SiteNew;
use Illuminate\View\Component;

class Discount extends Component
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
        $discounts = SiteNew::where('Published', 1)->get();

        return view('components.sections.discount', ['discounts' => $discounts]);
    }
}
