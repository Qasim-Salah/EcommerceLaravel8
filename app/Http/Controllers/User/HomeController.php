<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Category as categoryModel;
use App\Models\HomeSlider as HomeSliderModel;
use App\Models\Product as ProductModel;
use App\Models\Sale as SaleModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['slider'] = HomeSliderModel::active()->latest()->get();
        $data['latestProduct'] = ProductModel::latest()->take(8)->get();
        $data['saleProducts'] = ProductModel::where('sale_price', '>', 0)->inRandomOrder()->take(8)->get();
        $data['sale'] = SaleModel::find(1);
        return view('user.home', $data);
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
        return view('user.search', compact('category', 'product'));
    }

    public function wishlist()
    {
        return view('user.wishlist.index');
    }

    public function shop()
    {
        $product = ProductModel::latest()->paginate(PAGINATION_COUNT);
        $category = CategoryModel::all();
        $wish = Cart::instance('wishlist')->content()->pluck('id');
        return view('user.shop', compact('product', 'category', 'wish'));
    }

    public function cart()
    {
        return view('user.cart');
    }


}
