@extends('base')
@section('title')
    Ztech | Purchases
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Purchases</h2>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-9 text-end d-flex">
                            <form action="inventory/search" method="get" class="w-100"  class="search-form">
                                <div class="input-group text-end">
                                
                                    <input name="search" type="search" class=" header-search" placeholder="Search product/supplier.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn  input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                
                                </div>
                            </form>
                            </div>
                            <div class="col-3 text-end pr-0 mr-0">
                                <button class="btn btn-success add-supplier" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">New Purchase</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date and Time</th>
                            <th>Product Name</th>
                            <th>Supplier</th>
                            <th>Unit Buying Price</th>
                            <th>Quantity</th>
                            <th>Added By</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $purchase)

                        <tr>
                            <td>{{$purchase->created_at}}</td>
                            <td>{{$purchase->pname}}</td>
                            <td >{{$purchase->supplier}}</td>
                            <td>{{$purchase->unit_buy}} Tk.</td>
                            <td>{{$purchase->quantity}}</td>
                            <td>{{$purchase->added_by}}</td>                            
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div class="container offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="product-form mt-4">
            <h4 class="text-center">New Purchase</h4>
            <br>
            <!-- Product Form -->
            <form action="purchase" method="post">
                @csrf
                <div class="mb-3">
                    <label for="pname" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="pname" name="pname">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        <option selected>Select One</option>
                        @foreach ($category as $cat)
                            <option value="{{$cat->category}}">{{ucfirst($cat->category)}}</option>                        
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="productName" name="supplier">
                </div>
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Unit Buy Price</label>
                    <input type="number" class="form-control" id="buyingPrice" name="unit_buy">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
                <!-- Form Footer -->
                <div class="form-footer text-center">
                    <button type="button" class=" btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close" >Discard</button>
                    <button type="submit" class="btn btn-primary" value="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<style>
    .action form{
        display: inline-block;
        margin-bottom: 0;
    }
</style>


