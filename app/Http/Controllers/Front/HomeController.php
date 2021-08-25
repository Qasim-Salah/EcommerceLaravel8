<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product as ProductModel;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function shop()
    {
        $product = ProductModel::latest()->paginate(PAGINATION_COUNT);
        return view('front.shop', compact('product'));
    }

    public function cart()
    {
        return view('front.cart');
    }

    public function checkout()
    {
        return view('front.checkout');
    }
}
