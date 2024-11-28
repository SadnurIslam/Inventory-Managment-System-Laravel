@extends('base')
@section('title')
    Ztech | Order
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Order</h2>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-9 text-end d-flex">
                            <form action="{{route('order.index')}}" method="get" class="w-100"  class="search-form">
                                <div class="input-group text-end">
                                
                                    <input value="{{request('search')}}" name="search" type="search" class=" header-search" placeholder="Search product/category/customer.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn  input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                
                                </div>
                            </form>
                            </div>
                            <div class="col-3 text-end pr-0 mr-0">
                            <a class="btn btn-success add-supplier" href="{{route('order.add')}}">New Order</a>
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
                            <th>Customer Name</th>
                            <th>Contact No.</th>
                            <th>Status</th>
                            <th>Invoice</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{$order->id}}</td>
                            <td>{{$order->product_name}}</td>
                            <td >{{$order->category_name}}</td>
                            <td>{{$order->unit_price}} Tk.</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->customer_name}}</td>
                            <td>{{$order->customer_phone}}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($order->status == 'delivered')
                                    <span class="badge bg-success">Delivered</span>
                                @else
                                    <span class="badge bg-danger">Return</span>
                                @endif
                            </td>
                            <td><a class="text-decoration-none" href="{{'/invoice/'.$order->id.'/pdf'}}">download</a></td>
                            <td class="action">
                                    <a class="btn btn-primary" href="{{route('order.edit',$order->id)}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form class = "d-inline-block" action="{{route('order.delete',$order->id)}}" method="post" onsubmit="return confirm('Are you sure?')">
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
                {{$orders->links()}}
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


