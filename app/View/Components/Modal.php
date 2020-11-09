<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{

    public $tableId;
    public $modalId;
    public $tableUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tableId, $modalId, $tableUrl)
    {
        $this->tableId = $tableId;
        $this->modalId = $modalId;
        $this->tableUrl = $tableUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
