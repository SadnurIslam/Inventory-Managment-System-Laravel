<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;

class SupplierController extends Controller
{
    //
    function index() {
        if(request()->has("search")){
            $search = request("search");
            $supplier = Supplier::where("supplier_name","LIKE","%". $search ."%")
            ->orWhere("category_name","LIKE","%". $search ."%")
            ->orWhere("brand_name","LIKE","%". $search ."%")
            ->paginate(10);

            return view("supplier",["suppliers" => $supplier]);
        }
        $supplier = Supplier::paginate(10);
        return view("supplier",["suppliers" => $supplier]);
    }

    function addSupplier(){        
        return view("add-supplier");
    }

    function storeSupplier(Request $request){

        $request->validate([
            "supplier_name"=> "required|string|max:255",
            "supplier_phone"=> "required|numeric|digits_between:10,12",
            "supplier_email"=> "required|email",
            "category_name"=> "required|string|max:255",
            "brand_name"=> "required|string|max:255",
        ]);
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->category_name = $request->category_name;
        $supplier->brand_name = $request->brand_name;
        $supplier->save();
        return redirect()->route("supplier.index");
    }

    function editSupplier($id){
        $supplier = Supplier::find($id);
        return view("edit-supplier",["supplier" => $supplier]);
    }

    function updateSupplier(Request $request){
        $request->validate([
            "supplier_name"=> "required|string|max:255",
            "supplier_phone"=> "required|numeric|digits_between:10,12",
            "supplier_email"=> "required|email",
            "category_name"=> "required|string|max:255",
            "brand_name"=> "required|string|max:255",
        ]);
        $supplier = Supplier::find($request->id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->category_name = $request->category_name;
        $supplier->brand_name = $request->brand_name;
        $supplier->save();
        return redirect()->route("supplier.index");
    }

    function deleteSupplier($id){
        Supplier::destroy($id);
        return redirect()->route("supplier.index");
    }
}
