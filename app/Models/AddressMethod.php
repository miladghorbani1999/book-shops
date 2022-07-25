<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_method_id',
        'cost'
    ];
}
