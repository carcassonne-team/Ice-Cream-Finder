<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IceCreamShop extends Model
{
    use HasFactory;

    public function getAddress()
    {
        return "{$this->city}, {$this->street_name} {$this->street_number}";
    }

    public function getFlavorCount()
    {
        return IceCream::query()->where('available', true)->where('ice_cream_shop_id', $this->id)->count();
    }
}
