<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin: auto, border: 1px solid #333; }
        .table th, .table td { padding: 8px; text-align: left; border: 1px solid #333;}
        .total { text-align: right; margin-top: 20px; font-size: 18px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Invoice #{{ $order->id }}</h1>
        <p>Date: {{ $order->created_at->format('d M, Y') }}</p>
        <p>Customer: {{ $order->customer_name }}</p>
    </div>

    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Order ID</th>
                <td>#{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <th>Customer Contact</th>
                <td>{{ $order->customer_phone }}</td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td>{{ $order->product_name }}</td>
            </tr>
            <tr>
                <th>Product Category</th>
                <td>{{$order->category_name}}</td>
            </tr>
            <tr>
                <th>Unit Price</th>
                <td>{{ $order->unit_price }} Tk</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $order->quantity }}</td>
            </tr>

            <tr>
                <th>Sell By</th>
                <td>{{ $order->added_by }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $order->created_at}}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td><strong> {{ $order->quantity * $order->unit_price }} tk</strong></td>
            </tr>
        </tbody>
    </table>

</body>
</html>
