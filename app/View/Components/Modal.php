<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $shopId;

    /**
     * Create a new component instance.
     */
    public function __construct($shopId)
    {
        $this->shopId = $shopId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.modal");
    }
}
