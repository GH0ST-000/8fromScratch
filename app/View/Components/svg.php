<?php

namespace App\View\Components;

use Illuminate\View\Component;

# Class is not necessary if we're not using logic
# Classes should not start with lowercase character

class svg extends Component
{
    public function __construct()
    {

    }

    public function render()
    {
        return view('components.svg');
    }
}
