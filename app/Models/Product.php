<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'description',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('id', 'asc');
    }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function carts()
{
    return $this->hasMany(Cart::class);
}

}
