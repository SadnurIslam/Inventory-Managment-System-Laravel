@extends('base')
@section('title')
    Ztech | Add Inventory
@endsection
@section('content')
<div class="container mt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="row py-2">
            <div class="col-4">
                <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-8">
                <h4 class="text-left">Create New Order</h4>
            </div>
        </div>
    </div>
    <div class="card-body px-5">
    <form action="{{route('order.store')}}" method="post">
                @csrf
                <!-- Name -->
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="product_name"  value="{{old('product_name')}}">
                    @error('product_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category_name" value="{{old('category_name')}}">
                        @foreach ($category as $cat)
                            <option value="{{$cat->category_name}}" selected>{{($cat->category_name)}}</option>
                        @endforeach
                    </select>
                    @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Unit Price</label>
                    <input type="text" class="form-control" id="buyingPrice" name="unit_price"  value="{{old('unit_price')}}">
                    @error('unit_price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity"  value="{{old('quantity')}}">
                    @error('quantity')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="quantity" name="customer_name"  value="{{old('customer_name')}}">
                    @error('customer_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Customer Phone</label>
                    <input type="text" class="form-control" id="quantity" name="customer_phone" value="{{old('customer_phone')}}">
                    @error('customer_phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Status</label>
                    <select class="form-select" name="status" id="">
                        <option value="returned">Returned</option>
                        <option value="pending">Pending</option>
                        <option value="delivered" selected>Delivered</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Create Order</button>
                </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection

<style>
    a.btn{
        border-radius: 5px;
        padding: 4px 9px;
    }
</style>