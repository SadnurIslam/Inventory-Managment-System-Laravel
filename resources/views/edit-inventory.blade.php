@extends('base')
@section('title')
    Ztech | Edit Inventory
@endsection
@section('content')
<div class="container mt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="row">
            <div class="col-3 mt-2">
                <a class="btn" href="{{ URL::previous() }}">Back</a>
            </div>
            <div class="col-6"><h4 class="text-center mt-2">Update Product Info</h4></div>
            <div class="col-3">
                
            </div>
        </div>
    </div>
    <div class="card-body px-5">
    <form action="/edit-inventory/{{$inventory->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                <!-- Name -->
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{$inventory->name}}" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        @foreach ($category as $cat)
                            @if($inventory->category == $cat->category) 
                                <option value="{{$cat->category}}" selected>{{ucfirst($cat->category)}}</option>
                            @else
                                <option value="{{$cat->category}}"  >{{ucfirst($cat->category)}}</option>
                            @endif
                        @endforeach
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Actual Price</label>
                    <input type="text" class="form-control" id="buyingPrice" name="unit_price" value="{{$inventory->unit_price}}" required>
                </div>
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Sell Price</label>
                    <input type="text" class="form-control" id="buyingPrice" name="sell_price" value="{{$inventory->sell_price}}" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$inventory->quantity}}" required>
                </div>
                <!-- Form Footer -->
    <!-- Submit Button -->
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
        color: white;
        background-color: #779bb0;
        border-radius: 5px;
        padding: 4px 9px;
    }
</style>