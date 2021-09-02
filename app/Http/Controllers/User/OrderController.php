<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $order=OrderModel::where('user_id',Auth::user()->id)->latest()->paginate(PAGINATION_COUNT);
        return view('user.order.index',compact('order'));
    }

    public function details($id){
        $order=OrderModel::findorfail($id)->where('user_id',Auth::user()->id)->first();
        return view('user.order.details',compact('order'));

    }
}
