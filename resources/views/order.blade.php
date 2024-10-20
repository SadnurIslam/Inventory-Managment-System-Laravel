@extends('base')
@section('title')
    Ztech | Orders Info
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Orders</h2>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-9 text-end d-flex">
                                <form action="inventory/search" method="get" class="w-100"  class="search-form">
                                    <div class="input-group text-end">
                                        <input type="search" class=" header-search" placeholder="Search supplier..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <button class="btn  input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-3 text-end pr-0 mr-0">
                                <button class="btn btn-success add-supplier" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Orders</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Order Value</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $ord)
                            <tr>
                                <td>19{{$ord->id}}</td>
                                <td>{{$ord->name}}</td>
                                <td>{{$ord->category}}</td>
                                <td>{{$ord->unit_price}}</td>
                                <td>{{$ord->quantity}}</td>
                                @if($ord->status == 'delivered')
                                    <td><span class="badge bg-success">Delivered</span></td>
                                @elseif($ord->status == 'pending')
                                    <td><span class="badge bg-warning">Pending</span></td>
                                @else
                                    <td><span class="badge bg-danger">Returned</span></td>
                                @endif
                            </tr>
                        @endforeach                          
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div class="container offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="product-form mt-4">
            <h4 class="text-center">New Order</h4>
            <br>
            <!-- Product Form -->
            <form method="post" action="order">
                @csrf
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        @foreach ($category as $cat)
                            <option value="{{$cat->category}}">{{ucfirst($cat->category)}}</option>
                        
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Order Value (per unit)</label>
                    <input type="text" class="form-control" id="buyingPrice" name="unit_price">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="delivered">Delivered</option>
                        <option value="pending">Pending</option>
                        <option value="returned">Returned</option>
                    </select>
                <!-- Form Footer -->
                <div class="form-footer text-center">
                    <button type="button" class=" btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close" >Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection