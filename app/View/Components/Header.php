<?php

namespace App\View\Components;

use App\Models\Group;
use Illuminate\View\Component;

class Header extends Component
{
    public function render()
    {
        $groups = Group::orderBy('order')->get();


        return view('components.header', ['header_groups' => $groups]);
    }
}
