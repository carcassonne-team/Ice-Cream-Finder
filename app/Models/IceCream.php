<?php

declare(strict_types=1);

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IceCream extends Model
{
    use HasFactory;
    use Likeable;

}
