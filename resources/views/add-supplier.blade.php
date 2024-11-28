@extends('base')
@section('title')
    Ztech | New Supplier
@endsection
@section('content')
<div class="container mt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="row py-2">
            <div class="col-4">
                <a href="{{route('supplier.index')}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-8">
                <h4 class="text-left">Add New Supplier</h4>
            </div>
        </div>
    </div>
    <div class="card-body px-5">
    <form action="{{route('supplier.store')}}" method="post">
                @csrf
                <!-- Name -->
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="buyingPrice" name="supplier_name"  value="{{old('supplier_name')}}">
                    @error('supplier_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Supplier Email</label>
                    <input type="text" class="form-control" id="quantity" name="supplier_email"  value="{{old('supplier_email')}}">
                    @error('supplier_email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Supplier Phone</label>
                    <input type="text" class="form-control" id="quantity" name="supplier_phone"  value="{{old('supplier_phone')}}">
                    @error('supplier_phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Category</label>
                    <input type="text" class="form-control" id="quantity" name="category_name"  value="{{old('category_name')}}">
                    @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Brand Name</label>
                    <input type="text" class="form-control" id="quantity" name="brand_name"  value="{{old('brand_name')}}">
                    @error('brand_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Add Supplier</button>
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