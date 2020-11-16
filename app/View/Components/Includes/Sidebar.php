<?php

namespace App\View\Components\Includes;

use Illuminate\View\Component;

class Sidebar extends Component
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
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.includes.sidebar');
    }

    public function list()
    {
        $data = [
            'Dashboard' => collect(
                [
                    ['display' =>'Dashboard 1', 'route' => 'spph.draft'],
                    ['display' =>'Dashboard 2', 'route' => 'spph.draft'],
                    ['display' =>'Dashboard 3', 'route' => 'spph.draft'],
                    ['display' =>'Dashboard 4', 'route' => 'spph.draft'],
                ]
            ),
            'SPPH' => collect(
                [
                    ['display' =>'Create', 'route' => 'spph.create'],
                    ['display' =>'Draft', 'route' => 'spph.draft'],
                    ['display' =>'List', 'route' => 'spph.list'],
                    ['display' =>'Done', 'route' => 'spph.done'],
                    ['display' =>'All', 'route' => 'spph.all'],
                ]
            ),
          
        ];
     
        return $data;
    }
}
