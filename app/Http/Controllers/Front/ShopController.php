<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function details($slug)
    {
        $product = ProductModel::where('slug', $slug)->first();
        $popular_product = ProductModel::inRandomOrder()->limit(4)->get();
        $related_product = ProductModel::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        return view('front.product.details', compact('product', 'popular_product', 'related_product'));

    }

    public function store(Request $request)
    {
        $item = Cart::add($request->id, $request->name, 1, $request->regular_price)->associate(ProductModel::class);
        if ($item)
            return redirect()->route('front.cart')->with(['success' => 'Added successfully']);
        return redirect()->route('front.home')->with(['error' => 'An error occurred, please try again later']);

    }

    public function increaseQuantity($id)
    {
        $product = Cart::get($id);
        $qty = $product->qty + 1;
        Cart::update($id, $qty);
    }

    public function decreaseQuantity($id)
    {
        $product = Cart::get($id);
        $qty = $product->qty - 1;
        Cart::update($id, $qty);
    }

    public function destroy($id)
    {
        $product = Cart::remove($id);
        if ($product)
            return with(['success' => 'Added successfully']);
        return with(['error' => 'An error occurred, please try again later']);
    }

    public function destroyAll()
    {
        $product = Cart::destroy();
        if ($product)
            return redirect()->route('front.cart')->with(['success' => 'Added successfully']);
        return redirect()->route('front.cart')->with(['error' => 'An error occurred, please try again later']);
    }

    public function productCategory($slug)
    {
        $categoryAll=CategoryModel::all();
        $category = CategoryModel::where('slug', $slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $product = ProductModel::where('category_id',$category_id)->latest()->paginate(PAGINATION_COUNT);
        return view('front.product.category', compact('categoryAll','category' ,'product','category_name'));

    }

}
