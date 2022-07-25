<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityAddressMethod extends Model
{
    use HasFactory;

    protected $fillable =[
        'city_id',
        'shipping_method_id'
    ];
}
