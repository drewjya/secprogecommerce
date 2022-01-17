<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old = Cart::where('user_id', Auth::id())->get();
        foreach ($old as $item) {
            if (Product::where('id', $item->prod_id)->where('quantity', '<', $item->prod_qty)->exists()) {
                $removeitem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();;
        return view('frontend.checkout', compact('cartitems'));
    }

    public function order(Request $request)
    {
        $order = new Order();
        $order->name = Auth::user()->name;
        $order->address = $request->input('address');
        $order->track_no = 'ecom' . rand(1111, 9999);
        $order->save();


        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->prod_id = $item->prod_id;
            $order_item->qty = $item->prod_qty;
            $order_item->price = $item->product->selling_price;
            $order_item->save();
            $item->delete();
        }
        if (Auth::user()->address==NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->address = $request->input('address');
            $user->update();

        }

        return redirect('/')->with('status', 'Order placed successfully');
    }
}
