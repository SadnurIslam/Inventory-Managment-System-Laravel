<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Order;
class OrderController extends Controller
{
    //
    function index(){

        if(request()->has('search')){
            $search = request('search');
            $order = Order::where('product_name','LIKE','%'.$search.'%')
            ->orWhere('category_name','LIKE','%'.$search.'%')
            ->orWhere('customer_name','LIKE','%'.$search.'%')
            ->orWhere('customer_phone','LIKE','%'.$search.'%')
            ->paginate(10);

            return view('order',['orders'=>$order]);
        }

        $order = Order::orderBy("created_at","desc")->paginate(10);
        return view('order',['orders'=>$order]);
    }

    function addOrder(){
        return view('add-order');
    }

    function storeOrder(Request $request){
        $request->validate([
            'product_id'=>'required',
        ]);

        $inventory = Inventory::findOrFail(id: $request->product_id);
        $max_quantity = $inventory->quantity;

        $request->validate([
            'unit_price'=>'required|integer|min:0',
            'quantity'=>'required|integer|min:0|max:'.$max_quantity,
            'customer_name'=>'required',
            'customer_phone'=>'required|numeric|digits_between:9,15',
            'status'=> 'required',
        ],[
            'quantity.max' => 'Stock limit exceed. In stock: '.$max_quantity.'.',
        ]
    );


        $order = new Order();
        $order->product_name = $inventory->product_name;
        $order->unit_price = $request->unit_price;
        $order->category_name = $inventory->category_name;
        $order->quantity = $request->quantity;
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->status = $request->status;
        $order->added_by = session('username') ?? 'admin';
        $order->save();

        $inventory->quantity = $inventory->quantity - $request->quantity;
        $inventory->save();

        return redirect()->route('order.index');
    }

    function deleteOrder($id){
        Order::destroy($id);
        return redirect()->route('order.index');
    }

    function editorder($id){
        $order = order::findOrFail($id);
        return view('edit-order',['order'=>$order]);
    }

    function updateOrder(Request $request){

        $order = Order::findOrFail($request->id);

        $request->validate([
            'unit_price'=>'required|integer|min:0',
            'quantity'=>'required|integer|min:0',
            'customer_name'=>'required',
            'customer_phone'=>'required|numeric|digits_between:9,15',
            'status'=> 'required',
        ]);

        $inventory = Inventory::where('product_name',$request->product_name)->first();
        if($request->status == 'returned'){
            $inventory->quantity = $inventory->quantity + $request->quantity;
            $inventory->save();

        }
        
        $order->unit_price = $request->unit_price;
        $order->quantity = $request->quantity;
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->status = $request->status;
        $order->added_by = session('username') ?? 'admin';
        $order->save();

        return redirect()->route('order.index');
    }


}
