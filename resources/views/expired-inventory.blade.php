@extends('base')
@section('title')
    Ztech | Expired Inventory
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Expired Inventory</h2>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-9 text-end d-flex">
                            <form action="{{route('inventory.index')}}" method="get" class="w-100"  class="search-form">
                                <div class="input-group text-end">
                                
                                    <input value="{{request('search')}}" name="search" type="search" class=" header-search" placeholder="Search product/category/expired.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn  input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                
                                </div>
                            </form>
                            </div>
                            <div class="col-3 text-end pr-0 mr-0">
                            <a class="btn btn-success add-supplier" href="{{route('inventory.add')}}">New Product</a>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Warranty</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventory as $product)

                        <tr>
                            <td>#{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td >{{$product->category_name}}</td>
                            <td>{{$product->unit_price}} Tk.</td>
                            <td>{{$product->quantity}}</td>
                            
                            <td>
                                @if($product->expiry_date<date('Y-m-d'))
                                    <span class="badge bg-danger">Expired</span>
                                @else
                                    {{$product->expiry_date}}
                                @endif
                                
                            </td>
                            <td>
                                @if($product->quantity > 10)
                                    <span class="badge bg-success">In Stock</span>
                                @elseif($product->quantity == 0)
                                    <span class="badge bg-danger">Out of Stock</span>
                                @else
                                    <span class="badge bg-warning">Low Stock</span>
                                @endif
                            </td>
                            <td class="action">
                                    <a class="btn btn-info" href="{{route('inventory.show',$product->id)}}" ><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{route('inventory.edit',$product->id)}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form class = "d-inline-block" action="{{route('inventory.delete',$product->id)}}" method="post" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                {{$inventory->links()}}
            </div>
        </div>
    </main>
    
@endsection

<style>
    .action form{
        display: inline-block;
        margin-bottom: 0;
    }
    .badge{
        line-height: 1.4!important;
        border-radius: 5px;
    }
</style>


