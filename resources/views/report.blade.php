@extends('base')
@section('title')
    Ztech | Reports
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Reports</h2>
                    </div>
                    <div class="col-9">
                        
                    </div>
                </div>                
            </div>
            <div class="col-12">
                <br>
                <p>Total Product Purchase: {{$total_purchase}}</p>
                <p>Total Purchase Amount: {{$total_purchase}}</p>
                <p>Total Product Sale: {{$total_order}}</p>
                <p>Total Sell Amount: {{$total_sell}}</p>
                <p>Total Profit: {{$total_profit}}</p>
            </div>
        </div>
    </main>
    
@endsection


