<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order as OrderModel;



class OrderController extends Controller
{
    public function index()
    {
        $order=OrderModel::latest()->paginate(PAGINATION_COUNT);
        return view('admin.order.index',compact('order'));
    }

    public function details($id){
        $order=OrderModel::findorfail($id);
        return view('admin.order.details',compact('order'));

    }
}
