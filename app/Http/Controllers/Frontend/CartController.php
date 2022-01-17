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
            $products = Product::where('id', $prod_id)->first();
            if ($prod_check) {
                $curr = Product::where('id', $prod_id)->first();
                if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                    $first = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                    $cart = Cart::find($first->id);
                    $cart->prod_qty = $prod_qty;
                    $cart->update();
                    return redirect('/',)->with('status', $curr->name . " Updated");
                } else {

                    $cartItem = new Cart();
                    $cartItem->prod_id = $prod_id;
                    $cartItem->prod_qty = $prod_qty;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                    return redirect('/',)->with('status', $curr->name . " Added to Cart");
                }
            }
        } else {
            return redirect('/')->with('status', "Login to Continue");
        }


    }

    public function viewcart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

        $cart->delete();
        return redirect('cart')->with('status', "Item cart deleted Successfully");
    }

    public function confirm(){
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            $item->delete();
        }
        return redirect('cart')->with('status', "Thank You for Your transaction");
    }
    public function dellAll(){
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            $item->delete();
        }
        return redirect('cart')->with('status', "Item Cart Deleted");
    }
}
