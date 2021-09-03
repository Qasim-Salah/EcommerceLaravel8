<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\ContactRequest;
use App\Models\Category as categoryModel;
use App\Models\Contact as ContactModel;
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
        $data['sale'] = SaleModel::orderby('created_at', 'asc')->first();
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
        return view('user.wishlist');
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

    public function contact()
    {

        return view('user.contact');
    }

    public function storeContact(ContactRequest $request)
    {
        $contact = ContactModel::create($request->validated());
        if ($contact) {
            return redirect()->route('admin.home')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('admin.contact.store')->with(['error' => 'An error occurred, please try again later']);
    }

    public function category()
    {
        $category = CategoryModel::latest()->paginate(PAGINATION_COUNT);
        return view('user.category', compact('category'));
    }
}
