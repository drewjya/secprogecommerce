<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::id())->get();

        return view('frontend.user.index', compact('orders'));
    }
    public function view($id){
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();

        return view('frontend.user.view', compact('order'));
    }
}
