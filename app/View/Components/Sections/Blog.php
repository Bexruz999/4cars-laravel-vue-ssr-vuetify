<?php

namespace App\View\Components\Sections;

use App\Models\BlogPost;
use Illuminate\View\Component;

class Blog extends Component
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
        $blogs = BlogPost::take(4)->get();

        return view('components.sections.blog', ['blogs' => $blogs]);
    }
}
