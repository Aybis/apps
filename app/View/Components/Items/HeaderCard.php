<?php

namespace App\View\Components\Items;

use Illuminate\View\Component;

class HeaderCard extends Component
{
    public $header;
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $url)
    {
        $this->header = $header;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.items.header-card');
    }
}
