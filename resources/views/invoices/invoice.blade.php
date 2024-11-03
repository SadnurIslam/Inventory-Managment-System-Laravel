<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table, .table th, .table td { border: 1px solid #000; }
        .table th, .table td { padding: 8px; text-align: left; }
        .total { text-align: right; margin-top: 20px; font-size: 18px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Invoice #{{ $order->id }}</h1>
        <p>Date: {{ $order->created_at->format('d M, Y') }}</p>
        <p>Customer: {{ $order->cname }}</p>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <th>Product Name: </th>
                <td>{{ $order->pname }}</td>
            </tr>
            <tr>
                <th>Product Category: </th>
                <td>{{$order->category}}</td>
            </tr>
            <tr>
                <th>Unit Selling Price: </th>
                <td>{{ number_format($order->unit_sell, 2) }} Tk</td>
            </tr>
            <tr>
                <th>Quantity: </th>
                <td>{{ $order->quantity }}</td>
            </tr>
            <tr>
                <th>Total: </th>
                <td>{{ number_format($order->quantity * $order->unit_sell, 2) }} Tk</td>
            </tr>
            <tr>
                <th>Sell By: </th>
                <td>{{ $order->added_by }}</td>
            </tr>
            <tr>
                <th>Date: </th>
                <td>{{ $order->created_at->format('d M, Y') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="total">
        <strong>Total: {{ number_format($order->quantity * $order->unit_sell, 2) }} tk</strong>
    </div>
</body>
</html>
