<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $purchase->id }}</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background: #fef4e8;
            color: #3a2a1a;
            line-height: 1.6;
        }
        .container {
            max-width: 850px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border: 2px solid #d1bfa7;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background-image: linear-gradient(135deg, #fdfcf6 25%, #f5e9d4 100%);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px dashed #c2a176;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #8b5a2b;
            text-shadow: 1px 1px #fff;
        }
        .header p {
            margin: 5px 0;
            font-style: italic;
            font-size: 1.1em;
            color: #6f4e37;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #c2a176;
        }
        .table th {
            background-color: #e3c8a4;
            color: #3a2a1a;
            text-transform: uppercase;
            font-size: 1em;
        }
        .table td {
            background-color: #fdf9f3;
            font-size: 0.95em;
        }
        .table tr:nth-child(odd) td {
            background-color: #f7e5d5;
        }
        .highlight-row td {
            background-color: #e3c8a4;
            font-weight: bold;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 1.5em;
            color: #8b5a2b;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #6f4e37;
        }
        .footer p {
            background: #e3c8a4;
            color: #3a2a1a;
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
            font-style: italic;
        }
        .decorative-line {
            height: 3px;
            background: linear-gradient(to right, #8b5a2b, #fff, #8b5a2b);
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Invoice #{{ $purchase->id }}</h1>
            <p>Date: {{ $inventory->created_at->format('d M, Y') }}</p>
            <p>Supplier: {{ $inventory->supplier_name }}</p>
        </div>

        <div class="decorative-line"></div>

        <table class="table">
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
                    <td>{{ $inventory->category_name }}</td>
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
                    <th>Received By</th>
                    <td>{{ $inventory->added_by }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $inventory->created_at }}</td>
                </tr>
                <tr class="highlight-row">
                    <th>Total</th>
                    <td>{{ $inventory->quantity * $inventory->unit_price }} Tk</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <p>Total Amount: <strong>{{ $inventory->quantity * $inventory->unit_price }} Tk</strong></p>
        </div>

        <div class="decorative-line"></div>

        <div class="footer">
            <p>Thank you for your trust! We value your partnership.</p>
        </div>
    </div>
</body>
</html>
