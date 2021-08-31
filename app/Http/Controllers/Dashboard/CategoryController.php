<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category as CategoryModel;

class CategoryController extends Controller
{
    public function index()
    {
        $category = CategoryModel::latest()->paginate(PAGINATION_COUNT);
        return view('dashboard.category.index', compact('category'));

    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = CategoryModel::create($request->all());
        if (!$category)
            return redirect()->route('admin.category.create')->with(['success' => 'Added successfully']);
        return redirect()->route('admin.category')->with(['error' => 'An error occurred, please try again later']);
    }

    public function edit($slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();
        if ($category)
            return view('dashboard.category.edit', compact('category'));
        return redirect()->route('admin.category')->with(['error' => 'An error occurred, please try again later']);

    }

    public function update(categoryRequest $request, $slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();

        if ($category) {
            $data['name'] = $request->name;
            $data['slug'] = $request->slug;
            $category->update($data);
            return redirect()->route('admin.category')->with(['success' => 'Added successfully']);
        }

        return redirect()->route('admin.category.edit')->with(['error' => 'An error occurred, please try again later']);

    }
    public function destroy($slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();

        if ($category->delete())
            return redirect()->route('admin.category')->with(['success' => 'تم  الحذف بنجاح']);

        return redirect()->route('admin.category')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }



}
