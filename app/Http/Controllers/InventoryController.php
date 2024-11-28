<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Purchase;
class InventoryController extends Controller
{
    //
    function index(){

        if(request()->has('search')){
            $search = request('search');
            $inventory = Inventory::where('product_name','LIKE','%'.$search.'%')
            ->orWhere('category_name','LIKE','%'.$search.'%')
            ->paginate(10);

            return view('inventory',['inventory'=>$inventory]);
        }

        $inventory = Inventory::orderBy("created_at","desc")->paginate(10);
        return view('inventory',['inventory'=>$inventory]);
    }

    function addInventory(){
        $category = Category::all();
        return view('add-inventory',['category'=>$category]);
    }

    function storeInventory(Request $request){

        $request->validate([
            'product_name'=>'required',
            'unit_price'=>'required|integer|min:0',
            'category_name'=>'required',
            'quantity'=>'required|integer|min:0',
            'expiry_date'=>'required',
            'supplier_name'=>'required',
            'supplier_phone'=>'required|numeric|digits_between:9,15',
        ]);

        $inventory = new Inventory();
        $inventory->product_name = $request->product_name;
        $inventory->unit_price = $request->unit_price;
        $inventory->category_name = $request->category_name;
        $inventory->quantity = $request->quantity;
        $inventory->expiry_date = $request->expiry_date;
        $inventory->supplier_name = $request->supplier_name;
        $inventory->supplier_phone = $request->supplier_phone;
        $inventory->added_by = session('username') ?? 'admin';
        $inventory->save(); 

        $purchase = new Purchase(); 
        $purchase->product_name = $request->product_name;
        $purchase->unit_price = $request->unit_price;
        $purchase->quantity = $request->quantity;
        $purchase->category_name = $request->category_name;
        $purchase->supplier_name = $request->supplier_name;
        $purchase->supplier_phone = $request->supplier_phone;
        $purchase->save();

        return redirect()->route('inventory.index');
    }
    function deleteInventory($id){
        Inventory::destroy($id);
        return redirect()->route('inventory.index');
    }

    function editInventory($id){
        $category = Category::all();
        $inventory = Inventory::findOrFail($id);
        return view('edit-inventory',['inventory'=>$inventory,'category'=>$category]);
    }

    function updateInventory(Request $request){
        $inventory = Inventory::findOrFail($request->id);

        $request->validate([
            'product_name'=>'required',
            'unit_price'=>'required|integer|min:0',
            'category_name'=>'required',
            'quantity'=>'required|integer|min:0',
            'expiry_date'=>'required',
            'supplier_name'=>'required',
            'supplier_phone'=>'required|numeric|digits_between:9,15',
            
        ]);

        $inventory->product_name = $request->product_name;
        $inventory->unit_price = $request->unit_price;
        $inventory->category_name = $request->category_name;
        $inventory->quantity = $request->quantity;
        $inventory->expiry_date = $request->expiry_date;
        $inventory->supplier_name = $request->supplier_name;
        $inventory->supplier_phone = $request->supplier_phone;
        $inventory->added_by = session('username') ?? 'admin';
        $inventory->save(); 

        return redirect()->route('inventory.index');
    }


    function showInventory($id){
        $inventory = Inventory::findOrFail($id);
        return view('show-inventory',['inventory'=>$inventory]);
    }

    function expiredInventory(){
        $today = date('Y-m-d');
        $inventory = Inventory::where('expiry_date','<',$today)->paginate(10);
        return view('expired-inventory',['inventory'=>$inventory]);
    }
}
