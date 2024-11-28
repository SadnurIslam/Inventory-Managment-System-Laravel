@extends('base')
@section('title')
    Ztech | Update Inventory
@endsection
@section('content')
<div class="container mt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="row py-2">
            <div class="col-4">
                <a href="{{route('inventory.index')}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-8">
                <h4 class="text-left">Update Product Details</h4>
            </div>
        </div>
    </div>
    <div class="card-body px-5">
    <form action="{{route('inventory.update')}}" method="post">
                @csrf
                <!-- Name -->
                @method('PUT')
                <input type="hidden" name="id" value="{{$inventory->id}}">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="product_name"  value="{{old('product_name',$inventory->product_name)}}">
                    @error('product_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category_name" value="{{old('category_name',$inventory->category_name)}}">
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
                    <input type="text" class="form-control" id="buyingPrice" name="unit_price"  value="{{old('unit_price',$inventory->unit_price)}}">
                    @error('unit_price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity"  value="{{old('quantity',$inventory->quantity)}}">
                    @error('quantity')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Warranty</label>
                    <input type="date" class="form-control" id="quantity" name="expiry_date" value="{{old('expiry_date',$inventory->expiry_date)}}">
                    @error('expiry_date')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="quantity" name="supplier_name" value="{{old('supplier_name',$inventory->supplier_name)}}">
                    @error('supplier_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Supplier Phone</label>
                    <input type="text" class="form-control" id="quantity" name="supplier_phone" value="{{old('supplier_phone',$inventory->supplier_phone)}}">
                    @error('supplier_phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
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