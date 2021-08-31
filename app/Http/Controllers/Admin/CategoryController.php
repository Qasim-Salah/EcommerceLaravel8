<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category as CategoryModel;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = CategoryModel::latest()->paginate(PAGINATION_COUNT);
        return view('admin.category.index', compact('category'));

    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $requests = $request->validated();
        $requests['slug'] = Str::slug($request->slug);
        $category = CategoryModel::create($requests);
        if ($category) {
            return redirect()->route('admin.category')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('admin.category.create')->with(['error' => 'An error occurred, please try again later']);
    }

    public function edit($slug)
    {

        $category = CategoryModel::where('slug', $slug)->first();
        if ($category) {
            return view('admin.category.edit', compact('category'));
        }
        return redirect()->route('admin.category')->with(['error' => 'An error occurred, please try again later']);

    }

    public function update(categoryRequest $request, $slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();
        $requests = $request->validated();
        $requests['slug'] = Str::slug($request->slug);
        if ($category) {
            $category->update($requests);
            return redirect()->route('admin.category')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('admin.category.edit')->with(['error' => 'An error occurred, please try again later']);

    }

    public function destroy($slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();

        if ($category->delete()) {
            return redirect()->route('admin.category')->with(['success' => 'تم  الحذف بنجاح']);
        }
        return redirect()->route('admin.category')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }


}
