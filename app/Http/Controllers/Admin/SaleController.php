<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SaleDateRequest;
use App\Http\Requests\Dashboard\SliderRequest;
use App\Models\Sale as SaleModel;

class SaleController extends Controller
{

    public function create()
    {
        return view('admin.sale.create');
    }

    public function store(SaleDateRequest $request)
    {
        $sale = SaleModel::create([
            'status' => $request->status,
            'sale_date' => $request->sale_date,
        ]);
        if ($sale) {
            return redirect()->route('admin.sale.create')->with(['success' => 'Added successfully']);
        }
        return redirect()->route('admin.sale.create')->with(['error' => 'An error occurred, please try again later']);
    }

}
