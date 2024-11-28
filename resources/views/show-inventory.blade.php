@extends('base')
@section('title')
    Ztech | Details
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
                <h4 class="text-left">Product Details</h4>
            </div>
        </div>
    </div>
    <div class="card-body px-5">
        <table class="table">
            <tr>
                <th width="30%">Product Name</th>
                <td width="8%">:</td>
                <td>{{$inventory->product_name}}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>:</td>
                <td>{{$inventory->category_name}}</td>
            </tr>
            <tr>
                <th>Unit Price</th>
                <td>:</td>
                <td>{{$inventory->unit_price}}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>:</td>
                <td>{{$inventory->quantity}}</td>
            </tr>
            <tr>
                <th>Warranty</th>
                <td>:</td>
                <td>{{$inventory->expiry_date}}</td>
            </tr>
            <tr>
                <th>Supplier Name</th>
                <td>:</td>
                <td>{{$inventory->supplier_name}}</td>
            </tr>
            <tr>
                <th>Supplier Contact</th>
                <td>:</td>
                <td>{{$inventory->supplier_phone}}</td>
            <tr>
                <th>Purchased date</th>
                <td>:</td>
                <td>{{$inventory->created_at}}</td>
            </tr>
            <tr>
                <th>Added By</th>
                <td>:</td>
                <td>{{$inventory->added_by}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <a href="{{route('inventory.edit',$inventory->id)}}" class="btn btn-primary d-inline-block px-12">Edit</a>
                    <form class="d-inline-block" action="{{route('inventory.delete',$inventory->id)}}" method="post" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
            </tr>
        </table>
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
    form .btn-danger{
        line-height: 1.2;
    }
</style>