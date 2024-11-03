<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class ExpiredInventoryController extends Controller
{
    //
    function index(){
        $today = date('Y-m-d');
        $inventory = Inventory::where('warranty','<',$today)->first();
        return view('expired',['inventory'=>$inventory]);
    }
}
