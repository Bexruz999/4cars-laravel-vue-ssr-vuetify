<?php

namespace App\View\Components;

use App\Models\Group;
use Illuminate\View\Component;

class Footer extends Component
{
    public function render()
    {
        $categories = Group::inRandomOrder()->take(7)->get();


        return view('components.footer', ['categories' => $categories]);
    }
}
