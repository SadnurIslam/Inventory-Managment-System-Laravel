<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\category;
use App\Models\Inventory;

class PurchaseController extends Controller
{
    //
    function index(){
        $purchases = Purchase::all();
        $category = category::all();
        return view('purchase',['purchases'=>$purchases,'category'=>$category]);
    }
    function addPurchase(Request $req){
        $purchase = new Purchase;
        $purchase->pname = $req->pname;
        $purchase->category = $req->category;
        $purchase->unit_buy = $req->unit_buy;
        $purchase->quantity = $req->quantity;
        $purchase->supplier = $req->supplier;
        $purchase->added_by = session('username');
        $purchase->save();
        $inventory = Inventory::where('name',$req->pname)->first();
        if($inventory){
            $prev_price = $inventory->unit_price * $inventory->quantity;
            $new_price = $req->unit_buy * $req->quantity;
            $avg_price = ($prev_price + $new_price) / ($inventory->quantity + $req->quantity);
            if($inventory->quantity  == 0){
                $avg_price = $req->unit_buy;
            }
            $inventory->unit_price = $avg_price;
            $inventory->quantity = $inventory->quantity + $req->quantity;
            $inventory->save();
        }else{
            $inventory = new Inventory;
            $inventory->name = $req->pname;
            $inventory->category = $req->category;
            $inventory->unit_price = $req->unit_buy;
            $inventory->quantity = $req->quantity;
            $inventory->save();
        }
        return redirect('purchase');
    }
}
