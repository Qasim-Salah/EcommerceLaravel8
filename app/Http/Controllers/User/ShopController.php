<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use App\Models\Sale as SaleModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function details($slug)
    {
        $data = [];
        $data['product'] = ProductModel::where('slug', $slug)->first();
        $data['slider_product'] = ProductModel::paginate(PAGINATION_COUNT);
        $data['popular_product'] = ProductModel::inRandomOrder()->limit(4)->get();
        $data['related_product'] = ProductModel::where('category_id', $data['product']->category_id)->inRandomOrder()->limit(5)->get();
        $data['sale'] = SaleModel::find(1);
        return view('user.product.details', $data);

    }

    public function store(Request $request)
    {
        $item = Cart::instance('cart')->add($request->id, $request->name, 1, $request->regular_price)->associate(ProductModel::class);
        if ($item) {
            return redirect()->route('user.cart')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('user.shop')->with(['error' => 'An error occurred, please try again later']);

    }

    public function addToWishList(Request $request)
    {
        $wish = Cart::instance('wishlist')->add($request->id, $request->name, 1, $request->regular_price)->associate(ProductModel::class);
        if ($wish) {
            return redirect()->route('user.shop')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('user.shop')->with(['error' => 'An error occurred, please try again later']);
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        $item = Cart::instance('cart')->update($rowId, $qty);
        if ($item) {
            return redirect()->route('user.cart')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('user.cart')->with(['error' => 'An error occurred, please try again later']);

    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        $item = Cart::instance('cart')->update($rowId, $qty);
        if ($item) {
            return redirect()->route('user.cart')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('user.cart')->with(['error' => 'An error occurred, please try again later']);

    }

    public function destroy($rowId)
    {
        $product = Cart::instance('cart')->remove($rowId);
        if ($product) {
            return redirect()->route('user.cart')->with(['success' => 'remove successfully']);
        }
        return redirect()->route('user.cart')->with(['error' => 'An error occurred, please try again later']);
    }

    public function destroyWishlist($id)
    {
        foreach (Cart::instance('wishlist')->content() as $wish) {
            if ($wish->id == $id) {
                Cart::instance('wishlist')->remove($wish->rowId);
                return redirect()->back();
            }
        }
    }

    public function destroyAll()
    {
        $product = Cart::instance('cart')->destroy();
        if ($product) {
            return redirect()->route('user.cart')->with(['success' => 'delete successfully']);
        }
        return redirect()->route('user.cart')->with(['error' => 'An error occurred, please try again later']);
    }

    public function productCategory($slug)
    {
        $categoryAll = CategoryModel::all();
        $category = CategoryModel::where('slug', $slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        $product = ProductModel::where('category_id', $category_id)->latest()->paginate(PAGINATION_COUNT);
        return view('user.product.category', compact('categoryAll', 'category', 'product', 'category_name'));

    }

}
