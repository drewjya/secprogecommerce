<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.index', compact('orders'));
    }
    public function view($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.view', compact('order'));
    }
}
