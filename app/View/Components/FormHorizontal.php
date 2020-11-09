<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormHorizontal extends Component
{
    public $id;
    public $method;
    public $action;
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $method, $action, $url)
    {
        $this->id = $id;
        $this->method = $method;
        $this->action = $action;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form_horizontal');
    }
}
