<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CheckOutRequest;
use App\Mail\OrderMail;
use App\Models\Order as OrderModel;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;


class CheckOutController extends Controller
{
    public function thank()
    {
        return view('user.checkout.thank-you');
    }

    public function create()
    {
        return view('user.checkout.create');
    }

    public function store(CheckOutRequest $request)
    {

        try {
            DB::beginTransaction();
            $order = OrderModel::create([
                'user_id' => Auth::user()->id,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'discount' => 0,
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'line1' => $request->line1,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'zipcode' => $request->zipcode,
            ]);
            foreach (Cart::instance('cart')->content() as $itme) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $itme->id;
                $orderItem->order_id = $order->id;
                $orderItem->price = $itme->price;
                $orderItem->quantity = $itme->qty;
                $orderItem->save();
            }
            if ($request->has('paymentmode')) {
                $transactions = new Transaction();
                $transactions->user_id = Auth::user()->id;
                $transactions->order_id = $order->id;
                $transactions->mode = 'cod';
                $transactions->status = 'pending';
                $transactions->save();
            }
            Cart::instance('cart')->destroy();
            Mail::to($order->email)->send(new OrderMail($order));
            DB::commit();
            return redirect()->route('user.checkout.thank')->with(['success' => 'Added successfully']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('user.checkout.create')->with(['error' => 'An error occurred, please try again later']);
        }
    }
}
