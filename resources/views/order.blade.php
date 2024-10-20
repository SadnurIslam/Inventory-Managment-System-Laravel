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
                            <th>Order Value</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>1000</td>
                            <td>10</td>
                            <td>Delivered</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>2000</td>
                            <td>20</td>
                            <td>Delivered</td>
                        </tr>                                         
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
            <form>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" >
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category">
                        <option selected>Select One</option>
                        <option value="1">Coffee</option>
                        <option value="2">Spices</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Order Value</label>
                    <input type="number" class="form-control" id="buyingPrice">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity">
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