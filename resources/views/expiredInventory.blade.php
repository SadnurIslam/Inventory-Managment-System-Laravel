@extends('base')
@section('title')
    Ztech | Inventory
@endsection
@section('content')
    <main class="p-3 supplier">
        <!-- <@php if(isset($inventory))print_r($inventory) @endphp         -->
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Inventory</h2>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-9 text-end d-flex">
                            <form action="inventory/search" method="get" class="w-100"  class="search-form">
                                <div class="input-group text-end">
                                
                                    <input name="search" type="search" class=" header-search" placeholder="Search product/category.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn  input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                
                                </div>
                            </form>
                            </div>
                            <div class="col-3 text-end pr-0 mr-0">
                                <button class="btn btn-success add-supplier" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Inventory</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Original Price</th>
                            <th>New Price</th>
                            <th>Quantity</th>
                            <th>Availability</th>
                            <th>Warranty</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventory as $product)

                        <tr>
                            <td>#{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td >{{$product->category}}</td>
                            <td>{{$product->unit_price}} Tk.</td>
                            
                            <td>{{$product->quantity}}</td>
                            <td>
                                @if($product->quantity > 0)
                                    <span class="badge bg-success">In Stock</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
                            </td>
                            <td>
                                @if($product->warranty<date('Y-m-d'))
                                    <span class="badge bg-warning">Warranty Expired</span>
                                @else
                                    {{$product->warranty}}
                                @endif
                                
                            </td>
                            <td class="action">
                                    <a class="btn btn-primary" href="{{'/edit-inventory/'.$product->id}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                    <a href="{{'/inventory/delete/'.$product->id}}" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

<style>
    .action form{
        display: inline-block;
        margin-bottom: 0;
    }
</style>


