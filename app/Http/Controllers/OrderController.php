<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Inventory;
use App\Models\Record;
class OrderController extends Controller
{
    //
    function index() {
        $orders = Order::all();
        $category = Category::all();
        return view('order',['orders'=>$orders, 'category'=>$category]);
    }
    function addOrder(Request $request){
        $inventory = Inventory::where('id',$request->id)->first();
        if($inventory){
            if($inventory->quantity<$request->quantity){
                return redirect('order')->with('message','Not enough stock, max stock is '.$inventory->quantity);
            }
            $order = new Order();
            $order->pname = $inventory->name;
            $order->cname = $request->cname;
            $order->category = $request->category;
            $order->unit_sell = $request->unit_sell;
            $order->quantity = $request->quantity;
            $order->added_by = session('username');
            $order->save();
            $inventory->quantity = $inventory->quantity - $request->quantity;
            $inventory->save();

            $record = Record::where('id',$request->id)->first();

            if($record){
                $record->sell = $record->sell + $request->unit_sell*$request->quantity;
                $record->sellq = $record->quantity + $request->quantity;
                $record->buy = $record->buy+$inventory->unit_price*$request->quantity;
                $record->buyq = $record->buyq + $request->quantity;
                $record->save();
            }else{
                $record = new Record();
                $record->id = $request->id;
                $record->sell = $request->unit_sell*$request->quantity;
                $record->sellq = $record->quantity + $request->quantity;
                $record->buy = $inventory->unit_price*$request->quantity;
                $record->buyq = $request->quantity;
                
                $record->save();
            }

            return redirect('order');
        }
        
        return redirect('order')->with('message','No product found');
    }
}
