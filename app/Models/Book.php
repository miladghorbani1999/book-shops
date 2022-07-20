<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'count',
        'publication_year',
        'inventory',
        'writer_id'
    ];

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

}
