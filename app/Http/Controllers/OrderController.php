<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
class OrderController extends Controller
{
    //
    function index() {
        $order = Order::all();
        $category = Category::all();
        return view('order',['order'=>$order, 'category'=>$category]);
    }
    function addOrder(Request $request){
        $order = new Order();
        
        $order->name = $request->name;
        $order->category = $request->category;
        $order->unit_price = $request->unit_price;
        $order->quantity = $request->quantity;
        $order->status = $request->status;
        $order->save();
        return redirect('order');
    }
}
