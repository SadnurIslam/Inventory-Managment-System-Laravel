<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Category;
use App\Models\Inventory;

class PurchaseController extends Controller
{
    //
    public function index(){
        if(request()->has("search")){
            $search = request("search");
            $purchases = Purchase::where("product_name","LIKE","%".$search."%")
            ->orWhere("category_name","LIKE","%".$search."%")
            ->orWhere("supplier_name","LIKE","%".$search."%")
            ->orWhere("supplier_phone","LIKE","%".$search."%")
            ->paginate(10);
            
            return view("purchase",["purchases" => $purchases]);
        }
        $purchases = Purchase::paginate(10);
        return view("purchase",["purchases"=> $purchases]);
    }

    public function addPurchase(){
        $category = category::all();
        return view("add-purchase",["category"=> $category]);
    }

    function storePurchase(Request $request){

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

        return redirect()->route('purchase.index');
    }

    public function editPurchase($id){
        $purchase = Purchase::findOrFail($id);
       $inventory = Inventory::where("product_name","=",$purchase->product_name)->first();
       $category = Category::all();
       return view("edit-purchase",["purchase"=>$purchase,"inventory"=>$inventory,"category"=>$category]);
    }

    function updatePurchase(Request $request){

        $request->validate([
            'product_name'=>'required',
            'unit_price'=>'required|integer|min:0',
            'category_name'=>'required',
            'quantity'=>'required|integer|min:0',
            'expiry_date'=>'required',
            'supplier_name'=>'required',
            'supplier_phone'=>'required|numeric|digits_between:9,15',
        ]);

        $inventory = Inventory::findOrFail($request->product_id);

        $inventory->product_name = $request->product_name;
        $inventory->unit_price = $request->unit_price;
        $inventory->category_name = $request->category_name;
        $inventory->quantity = $request->quantity;
        $inventory->expiry_date = $request->expiry_date;
        $inventory->supplier_name = $request->supplier_name;
        $inventory->supplier_phone = $request->supplier_phone;
        $inventory->added_by = session('username') ?? 'admin';
        $inventory->save(); 

        $purchase = Purchase::findOrFail($request->purchase_id);
        $purchase->product_name = $request->product_name;
        $purchase->unit_price = $request->unit_price;
        $purchase->quantity = $request->quantity;
        $purchase->category_name = $request->category_name;
        $purchase->supplier_name = $request->supplier_name;
        $purchase->supplier_phone = $request->supplier_phone;
        $purchase->save();

        return redirect()->route('purchase.index');
    }

    public function deletePurchase($id){
        Purchase::destroy($id);

        return redirect()->route('purchase.index');
    }
    
}
