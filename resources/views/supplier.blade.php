@extends('base')
@section('title')
    Ztech | Suppliers Info
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Suppliers</h2>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-9 text-end d-flex">
                                <form action="supplier/search" method="get" class="w-100"  class="search-form">
                                    <div class="input-group text-end">
                                        <input type="search" class=" header-search" placeholder="Search supplier..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <button class="btn  input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-3 text-end">
                                <button class="btn btn-success add-supplier" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Supplier</button>
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
                            <th>Supplier Name</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supplier as $sup)
                            <tr>
                                <td>{{$sup->id}}</td>
                                <td>{{$sup->name}}</td>
                                <td>{{$sup->product}}</td>
                                <td>{{$sup->category}}</td>
                                <td>{{$sup->phone}}</td>
                                <td>{{$sup->email}}</td>
                            </tr>
                        @endforeach                                         
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div class="container offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="product-form mt-4">
            <h4 class="text-center">New Supplier</h4>
            <br>
            <!-- Product Form -->
            <form action="supplier" method="post">
                @csrf
                <div class="mb-3">
                    <label for="productName" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="productName" name="name">
                </div>
                <div class="mb-3">
                    <label for="productID" class="form-label">Product</label>
                    <input type="text" class="form-control" id="productID" name="product">
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
                    <label for="buyingPrice" class="form-label">Contact</label>
                    <input type="number" class="form-control" id="buyingPrice" name="phone">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Email</label>
                    <input type="text" class="form-control" id="quantity" name="email">
                </div>
                <!-- Form Footer -->
                <div class="form-footer text-center">
                    <button type="button" class=" btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close" >Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection