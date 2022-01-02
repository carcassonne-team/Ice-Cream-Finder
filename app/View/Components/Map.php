<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class Map extends Component
{
    /** Create a new component instance. */
    public $lat;
    public $lng;

    /**
     * Map constructor.
     * @param $lat
     * @param $lng
     */
    public function __construct($lat = "", $lng = "")
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.map");
    }
}
