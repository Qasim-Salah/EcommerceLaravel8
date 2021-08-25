<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'sku',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'category_id',];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

//    public function hasStock($quantity)
//    {
//        return $this->qty >= $quantity;
//    }
//
//    public function outOfStock()
//    {
//        return $this->qty === 0;
//    }
//
//    public function inStock()
//    {
//        return $this->qty >= 1;
//    }
//
//    public function getTotal($converted = true)
//    {
//        return $total = $this->special_price ?? $this->price;
//
//    }

    public function getPhotoAttribute($val)
    {

        return $val ? asset('assets/images/products/' . $val) : '';
    }

}
