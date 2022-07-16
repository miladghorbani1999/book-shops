<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'parent_id'
    ];

   public function books(): \Illuminate\Database\Eloquent\Relations\HasMany
   {
       return $this->hasMany(Book::class);
   }
}
