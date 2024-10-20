<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;

class SupplierController extends Controller
{
    //
    function index() {
        $supplier = Supplier::all();
        $category = Category::all();
        return view('supplier',['supplier'=>$supplier, 'category'=>$category]);
    }
    function addSupplier(Request $request){
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->category = $request->category;
        $supplier->product = $request->product;
        $supplier->save();
        return redirect('supplier');
    }
}
