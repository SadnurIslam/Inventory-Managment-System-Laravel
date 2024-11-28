<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $purchase->id }}</title>
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
        <h1>Invoice #{{ $inventory->id }}</h1>
        <p>Date: {{ $inventory->created_at->format('d M, Y') }}</p>
        <p>Supplier: {{ $inventory->supplier_name }}</p>
    </div>

    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Purchase ID</th>
                <td>#{{ $purchase->id }}</td>
            </tr>
            <tr>
                <th>Supplier Name</th>
                <td>{{ $inventory->supplier_name }}</td>
            </tr>
            <tr>
                <th>Supplier Contact</th>
                <td>{{ $inventory->supplier_phone }}</td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td>{{ $inventory->product_name }}</td>
            </tr>
            <tr>
                <th>Product Category</th>
                <td>{{$inventory->category_name}}</td>
            </tr>
            <tr>
                <th>Unit Price</th>
                <td>{{ $inventory->unit_price }} Tk</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $inventory->quantity }}</td>
            </tr>

            <tr>
                <th>Recieved By</th>
                <td>{{ $inventory->added_by }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $inventory->created_at}}</td>
            </tr>
            <tr>
                <th>Total</th>
                <td><strong> {{ $inventory->quantity * $inventory->unit_price }} tk</strong></td>
            </tr>
        </tbody>
    </table>

</body>
</html>
