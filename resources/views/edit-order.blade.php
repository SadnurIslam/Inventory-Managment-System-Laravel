@extends('base')
@section('title')
    Ztech | Update Order
@endsection
@section('content')
<div class="container mt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="row py-2">
            <div class="col-4">
                <a href="{{route('order.index')}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-8">
                <h4 class="text-left">Update Order</h4>
            </div>
        </div>
    </div>
    <div class="card-body px-5">
    <form action="{{route('order.update')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$order->id}}">
                <input type="hidden" name="product_name" value="{{$order->product_name}}">
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Unit Price</label>
                    <input type="text" class="form-control" id="buyingPrice" name="unit_price"  value="{{old('unit_price',$order->unit_price)}}">
                    @error('unit_price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity"  value="{{old('quantity',$order->quantity)}}">
                    @error('quantity')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="quantity" name="customer_name"  value="{{old('customer_name',$order->customer_name)}}">
                    @error('customer_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Customer Phone</label>
                    <input type="text" class="form-control" id="quantity" name="customer_phone" value="{{old('customer_phone',$order->customer_phone)}}">
                    @error('customer_phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Status</label>
                    <select class="form-select" name="status" id="">
                        <option value="returned" @if($order->status=='returned')selected @endif >Returned</option>
                        <option value="pending" @if($order->status=='pending') selected @endif >Pending</option>
                        <option value="delivered" @if($order->status=='delivered')selected @endif>Delivered</option>
                    </select>
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