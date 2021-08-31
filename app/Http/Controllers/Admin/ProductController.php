<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = ProductModel::latest()->paginate(PAGINATION_COUNT);
        return view('admin.product.index', compact('product'));

    }

    public function create()
    {
        $category = CategoryModel::all();

        return view('admin.product.create', compact('category'));
    }

    public function store(ProductRequest $request)
    {
        $fileName = "";
        if ($request->has('image'))
            ###helper###
            $fileName = uploadImage('products', $request->image);

        $product = ProductModel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'short_description' => $request->short_description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'sku' => $request->sku,
            'stock_status' => $request->stock_status,
            'featured' => $request->featured,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image' => $fileName
        ]);
        if ($product) {
            return redirect()->route('admin.product')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('admin.product.create')->with(['error' => 'An error occurred, please try again later']);
    }

    public function edit($slug)
    {
        $category = CategoryModel::all();
        $product = ProductModel::where('slug', $slug)->first();
        if ($product) {
            return view('admin.product.edit', compact('product', 'category'));
        }
        return redirect()->route('admin.product')->with(['error' => 'An error occurred, please try again later']);

    }

    public function update(ProductRequest $request, $slug)
    {
        $product = ProductModel::where('slug', $slug)->first();

        $fileName = "";
        if ($request->has('image'))
            ###helper###
            $fileName = uploadImage('products', $request->image);

        $product = ProductModel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'short_description' => $request->short_description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'sku' => $request->sku,
            'stock_status' => $request->stock_status,
            'featured' => $request->featured,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image' => $fileName
        ]);
        if ($product) {
            return redirect()->route('admin.product.edit')->with(['success' => 'Update successfully']);
        }
        return redirect()->route('admin.product')->with(['error' => 'An error occurred, please try again later']);

    }

    public function destroy($slug)
    {
        $product = ProductModel::where('slug', $slug)->first();
        $image = Str::after($product->image, 'assets/images/products');
        $image = public_path('assets/images/products' . $image);
        unlink($image); //delete from folder
        if ($product->delete()) {
            return redirect()->route('admin.product')->with(['success' => 'delete successfully']);
        }
        return redirect()->route('admin.product')->with(['error' => 'An error occurred, please try again later']);

    }


}
