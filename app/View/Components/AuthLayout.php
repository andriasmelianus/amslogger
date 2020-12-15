<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthLayout extends Component
{
    public $title;
    public $htmlBodyClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $htmlBodyClass = '')
    {
        $this->title = $title;
        $this->htmlBodyClass = $htmlBodyClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('_layouts.auth');
    }
}
