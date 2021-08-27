<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\SlidersType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SliderRequest;
use App\Models\HomeSlider as HomeSliderModel;
use Illuminate\Support\Str;

class HomeSliderController extends Controller
{
    public function index()
    {
        $slider = HomeSliderModel::all();
        return view('dashboard.homeslider.index', compact('slider'));

    }

    public function create()
    {
        return view('dashboard.homeslider.create');
    }

    public function store(SliderRequest $request)
    {

        $fileName = "";
        if ($request->has('image'))
            ###helper###
            $fileName = uploadImage('sliders', $request->image);

        $slider = HomeSliderModel::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'price' => $request->price,
            'link' => $request->link,
            'status'=>$request->status,
            'image' =>$fileName,
        ]);
        if (!$slider)
            return redirect()->route('admin.slider.create')->with(['success' => 'Added successfully']);
        return redirect()->route('admin.slider')->with(['error' => 'An error occurred, please try again later']);
    }

    public function edit($id)
    {
        $slider = HomeSliderModel::findorfail($id);
            return view('dashboard.homeslider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $id)
    {
        $slider = HomeSliderModel::findorfail($id);

        $fileName = "";
        if ($request->has('image'))
            ###helper###
            $fileName = uploadImage('sliders', $request->image);

        if  ($slider) {
            $data['title'] = $request->title;
            $data['subtitle'] = $request->subtitle;
            $data['price'] = $request->price;
            $data['link'] = $request->link;
            $data['status'] = $request->status;
            $data['image'] = $request->$fileName;

            $slider->update($data);
            return redirect()->route('admin.slider')->with(['success' => 'Added successfully']);
        }

        return redirect()->route('admin.slider.edit')->with(['error' => 'An error occurred, please try again later']);

    }
    public function destroy($id)
    {
        $slider = HomeSliderModel::findorfail($id);
//            $image = Str::after($slider->image, 'assets/images/sliders');
//            $image = public_path('assets/images/sliders' . $image);
//            unlink($image); //delete from folder

        if ($slider->delete())
            return redirect()->route('admin.slider')->with(['success' => 'تم  الحذف بنجاح']);

        return redirect()->route('admin.slider')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }



}
