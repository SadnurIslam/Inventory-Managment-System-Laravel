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

            return view('order',['order'=>$order]);
        }

        $order = Order::orderBy("created_at","desc")->paginate(10);
        return view('order',['orders'=>$order]);
    }

    function addOrder(){
        $category = Category::all();
        return view('add-order',['category'=>$category]);
    }

    function storeOrder(Request $request){

        $request->validate([
            'product_name'=>'required',
            'unit_price'=>'required|decimal:0,10|min:0',
            'category_name'=>'required',
            'quantity'=>'required|integer|min:0',
            'customer_name'=>'required',
            'customer_phone'=>'required|numeric|digits_between:9,15',
            'status'=> 'required',
        ]);

        $order = new Order();
        $order->product_name = $request->product_name;
        $order->unit_price = $request->unit_price;
        $order->category_name = $request->category_name;
        $order->quantity = $request->quantity;
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->status = $request->status;
        $order->added_by = session('username') ?? 'admin';
        $order->save(); 

        $inventory = Inventory::findOrFail($request->id);

        $inventory->quantity = $inventory->quantity - $request->quantity;

        return redirect()->route('order.index');
    }
    
    function deleteOrder($id){
        $order = order::destroy($id);
        return redirect()->route('order.index');
    }

    function editorder($id){
        $category = Category::all();
        $order = order::findOrFail($id);
        return view('edit-order',['order'=>$order,'category'=>$category]);
    }

    function updateorder(Request $request){
        $order = order::findOrFail($request->id);

        $request->validate([
            'product_name'=>'required',
            'unit_price'=>'required|integer|min:0',
            'category_name'=>'required',
            'quantity'=>'required|integer|min:0',
            'expiry_date'=>'required',
            'supplier_name'=>'required',
            'supplier_phone'=>'required|numeric|digits_between:9,15',
            
        ]);

        $order->product_name = $request->product_name;
        $order->unit_price = $request->unit_price;
        $order->category_name = $request->category_name;
        $order->quantity = $request->quantity;
        $order->expiry_date = $request->expiry_date;
        $order->supplier_name = $request->supplier_name;
        $order->supplier_phone = $request->supplier_phone;
        $order->added_by = session('username') ?? 'admin';
        $order->save(); 

        return redirect()->route('order.index');
    }

    function search(Request $request){
        $today = date('Y-m-d');
        $order = order::where('name','like',"%$request->search%")
        ->orWhere('category','like',"%{$request->search}%")
        ->get();
        if(strcasecmp($request->search,'expired')==0){
            $order = order::where('warranty','<',$today)->get();
        }
        return view('order',['order'=>$order,'search'=>$request->search,'category'=>Category::all()]);
    }

    function showorder($id){
        $order = order::findOrFail($id);
        return view('show-order',['order'=>$order]);
    }

    function expiredorder(){
        $today = date('Y-m-d');
        $order = order::where('expiry_date','<',$today)->paginate(10);
        return view('expired-order',['order'=>$order]);
    }
}
