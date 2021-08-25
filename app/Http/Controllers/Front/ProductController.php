<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function details($slug)
    {
        $product = ProductModel::where('slug', $slug)->first();
        $popular_product = ProductModel::inRandomOrder()->limit(4)->get();
        $related_product = ProductModel::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        return view('front.product.details', compact('product', 'popular_product', 'related_product'));

    }

}
