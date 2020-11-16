<?php

namespace App\View\Components\Items;

use Illuminate\View\Component;

class Table extends Component
{
    public $idTable;
    public $dataUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idTable, $dataUrl)
    {
        $this->idTable = $idTable;
        $this->dataUrl = $dataUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.items.table');
    }
}
