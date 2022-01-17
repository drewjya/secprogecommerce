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
use Illuminate\Support\Facades\Crypt;

class CheckoutController extends Controller
{
    public function index()
    {
        $old = Cart::where('user_id', Auth::id())->get();
        // $item->prod_qty <= $item->product->quantity
        foreach ($old as $item) {
            if ($item->prod_qty > $item->product->quantity) {
                $removeitem = Cart::where('id', $item->id)->first();
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
        $order->user_id = Auth::id();
        $order->address = Crypt::encrypt(strip_tags($request->input('address')));;
        $order->track_no = 'ecom' . rand(1111, 9999);
        $total = 0;
        $order->total_price = $total;
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitems as $item) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->prod_id = $item->prod_id;
            $order_item->qty = $item->prod_qty;
            $order_item->price = $item->product->selling_price;
            $total += $item->prod_qty * $item->product->selling_price;
            $order_item->save();
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_qty;
            $prod->update();
            $item->delete();
        }
        $order->total_price = $total;
        $order->save();
        if (Auth::user()->address == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->address = Crypt::encrypt(strip_tags($request->input('address')));
            $user->update();
        }


        return redirect('/')->with('status', 'Order placed successfully');
    }
}
