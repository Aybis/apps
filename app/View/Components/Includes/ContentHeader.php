<?php

namespace App\View\Components\Includes;

use Illuminate\View\Component;

class ContentHeader extends Component
{
    public $title;
    public $pageTitle;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageTitle="", $title="")
    {
        $this->title = $title;
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.includes.content-header');
    }
}
