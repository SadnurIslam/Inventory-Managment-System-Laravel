<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Inventory;
class OrderController extends Controller
{
    //
    function index() {
        $orders = Order::all();
        $category = Category::all();
        return view('order',['orders'=>$orders, 'category'=>$category]);
    }
    function addOrder(Request $request){
        $inventory = Inventory::where('name',$request->pname)->first();
        if($inventory){
            if($inventory->quantity<$request->quantity){
                return redirect('order')->with('message','Not enough stock, max stock is '.$inventory->quantity);
            }
            $order = new Order();
            $order->pname = $request->pname;
            $order->cname = $request->cname;
            $order->category = $request->category;
            $order->unit_sell = $request->unit_sell;
            $order->quantity = $request->quantity;
            $order->added_by = session('username');
            $order->save();
            $inventory->quantity = $inventory->quantity - $request->quantity;
            $inventory->save();
            return redirect('order');
        }
        return redirect('order')->with('message','No product found');
    }
}
