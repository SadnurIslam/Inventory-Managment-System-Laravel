<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
class InventoryController extends Controller
{
    //
    function index(){
        $inventory = Inventory::all();
        $category = Category::all();
        return view('inventory',['inventory'=>$inventory, 'category'=>$category]);
    }
    function addInventory(Request $request){
        $inventory = new Inventory();
        
        $inventory->name = $request->name;
        $inventory->category = $request->category;
        $inventory->unit_price = $request->unit_price;
        $inventory->sell_price = $request->unit_price+$request->unit_price*0.2;
        $inventory->quantity = $request->quantity;
        $inventory->warranty = $request->warranty;
        $inventory->save();
        return redirect('inventory');
    }
    function deleteInventory($id){
        $inventory = Inventory::destroy($id);
        return redirect('inventory');
    }
    function editInventory($id){
        $category = Category::all();
        $inventory = Inventory::where('id', $id)->first();
        return view('edit-inventory',['inventory'=>$inventory,'category'=>$category]);
    }
    function UpdateInventory(Request $request,$id){
        $inventory = Inventory::find($id);
        $inventory->name = $request->name;
        $inventory->category = $request->category;
        $inventory->unit_price = $request->unit_price;
        $inventory->sell_price = $request->sell_price;
        $inventory->quantity = $request->quantity;
        $inventory->warranty = $request->expiry_date;
        $inventory->save();
        return redirect('inventory');
    }

    function search(Request $request){
        $today = date('Y-m-d');
        $inventory = Inventory::where('name','like',"%$request->search%")
        ->orWhere('category','like',"%{$request->search}%")
        ->get();
        if(strcasecmp($request->search,'expired')==0){
            $inventory = Inventory::where('warranty','<',$today)->get();
        }
        return view('inventory',['inventory'=>$inventory,'search'=>$request->search,'category'=>Category::all()]);
    }
}
