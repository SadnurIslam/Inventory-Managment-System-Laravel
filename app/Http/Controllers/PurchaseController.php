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

        $inventory = new Inventory();
        $inventory->name = $req->pname;
        $inventory->category = $req->category;
        $inventory->unit_price = $req->unit_buy;
        $inventory->sell_price = $req->unit_buy+$req->unit_buy*0.2;
        $inventory->quantity = $req->quantity;
        $inventory->warranty = $req->expiry_date;
        $inventory->save();

        return redirect('purchase');
    }
}
