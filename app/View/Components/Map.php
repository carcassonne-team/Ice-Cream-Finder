<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class Map extends Component
{
    /** Create a new component instance. */
    public $lat;
    public $lng;
    public  $shopName;

    /**
     * Map constructor.
     * @param string $lat
     * @param string $lng
     * @param string $shopName
     */
    public function __construct($lat = "", $lng = "", $shopName= "")
    {
        $this->lat = $lat;
        $this->lng = $lng;
        $this->shopName = $shopName;
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
