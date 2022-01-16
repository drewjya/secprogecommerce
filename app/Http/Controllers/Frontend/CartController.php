<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');
        if (Auth::check()) {
            $prod_check = Product::where('id', $prod_id)->exists();

            if ($prod_check) {
                $curr = Product::where('id', $prod_id)->first();
                if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                    return redirect('/')->with('status', $curr->name . " Already Exists");
                } else {

                    $cartItem = new Cart();
                    $cartItem->prod_id = $prod_id;
                    $cartItem->prod_qty = $prod_qty;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                    return redirect('/')->with('status', $curr->name . " Added to Cart");
                }
            }
        } else {
            return redirect('/')->with('status', "Login to Continue");
        }
    }
}
