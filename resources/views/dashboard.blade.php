@extends('base')
@section('title')
    Ztech | Dashboard
@endsection



@section('content')
<div class="container mt-2">
    <div class="row">
        <!-- Stock Levels Chart -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Stock Levels by Category</div>
                <div class="card-body">
                    <canvas id="stockChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Sell vs Buy Chart -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Sell vs Buy (Last 7 Days)</div>
                <div class="card-body">
                    <canvas id="sellBuyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Highest Selling Products Chart -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Highest Selling Products</div>
                <div class="card-body">
                    <canvas id="highestSellingChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Monthly Sales Chart -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Monthly Sales</div>
                <div class="card-body">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Stock Levels Chart
    const stockCtx = document.getElementById('stockChart').getContext('2d');
    const stockChart = new Chart(stockCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($stockResponse['categories']) !!},
            datasets: [{
                label: 'Stock Quantity',
                data: {!! json_encode($stockResponse['quantities']) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
    });

    // Sell vs Buy Chart
    const sellBuyCtx = document.getElementById('sellBuyChart').getContext('2d');
    const sellBuyChart = new Chart(sellBuyCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($sellBuyResponse['days']) !!},
            datasets: [
                {
                    label: 'Total Sell',
                    data: {!! json_encode($sellBuyResponse['sell']) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true,
                },
                {
                    label: 'Total Buy',
                    data: {!! json_encode($sellBuyResponse['buy']) !!},
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 2,
                    fill: true,
                }
            ]
        },
    });

    // Highest Selling Products Chart
    const highestSellingCtx = document.getElementById('highestSellingChart').getContext('2d');
    const highestSellingChart = new Chart(highestSellingCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($highestSellingResponse['products']) !!},
            datasets: [{
                label: 'Units Sold',
                data: {!! json_encode($highestSellingResponse['quantities']) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
    });

    // Monthly Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($salesResponse['months']) !!},
            datasets: [{
                label: 'Total Sales',
                data: {!! json_encode($salesResponse['totals']) !!},
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 2,
                fill: true
            }]
        },
    });
</script>
@endsection
