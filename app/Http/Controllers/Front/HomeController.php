<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Category as categoryModel;
use App\Models\HomeSlider as HomeSliderModel;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider = HomeSliderModel::active()->latest()->get();
        $product = ProductModel::latest()->take(8)->get();
        return view('front.home', compact('slider', 'product'));
    }

    public function search(request $request)
    {
        $category = CategoryModel::all();
        $search = ($request->search);
        if ($search) {
            $product = ProductModel::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->latest()->paginate(PAGINATION_COUNT);
        }
        return view('front.search', compact('category', 'product'));
    }

    public function shop()
    {
        $product = ProductModel::latest()->paginate(PAGINATION_COUNT);
        $category = CategoryModel::all();
        return view('front.shop', compact('product', 'category'));
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
