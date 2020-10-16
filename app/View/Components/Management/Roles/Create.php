<?php

namespace App\View\Components\Management\Roles;

use Illuminate\View\Component;

class Create extends Component
{

    public $idForm;
    public $urlAction;
    public $nameButton;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idForm, $urlAction, $nameButton)
    {
        $this->idForm = $idForm;
        $this->urlAction = $urlAction;
        $this->nameButton = $nameButton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.management.roles.create');
    }
}
