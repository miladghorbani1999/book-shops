<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory, HasRecursiveRelationships;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'parent_id'
    ];

   public function books(): \Illuminate\Database\Eloquent\Relations\HasMany
   {
       return $this->hasMany(Book::class);
   }

    public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class, 'id','parent_id');

    }
}
