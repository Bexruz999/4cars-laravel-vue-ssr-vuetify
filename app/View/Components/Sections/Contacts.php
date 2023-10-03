<?php

namespace App\View\Components\Sections;

use App\Models\Contact;
use Illuminate\View\Component;

class Contacts extends Component
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
        $contacts = Contact::where('status', 1)->where('position', 'contact')->get();

        return view('components.sections.contacts', ['contacts' => $contacts]);
    }
}
