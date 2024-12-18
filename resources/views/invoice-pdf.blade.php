<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .invoice {
            max-width: 850px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 28px;
            color: #333333;
        }
        .invoice-header p {
            margin: 5px 0 0;
            font-size: 16px;
            color: #777;
        }
        .invoice-details {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        .invoice-details .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .invoice-details .row span {
            font-size: 16px;
            color: #555;
        }
        .invoice-details .row strong {
            color: #333;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #e9ecef;
            padding: 10px 15px;
            text-align: left;
        }
        .invoice-table th {
            background-color: #96918c;
            color: white;
            font-size: 14px;
        }
        .invoice-table td {
            font-size: 14px;
            color: #555;
        }
        .invoice-summary {
            text-align: right;
            font-size: 14px;
            margin-top: 20px;
        }
        .invoice-summary p {
            margin: 5px 0;
        }
        .invoice-summary .total {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            margin-top: 20px;
            border-top: 1px solid #e9ecef;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <p>Professional and Elegant Invoice</p>
        </div>

        <div class="invoice-details">
            <div class="row">
                <span><strong>Invoice Number:</strong> {{ $invoice->invoice_code }}</span>
                <span><strong>Date:</strong> {{ $invoice->date }}</span>
            </div>
            <div class="row">
                <span><strong>Customer Name:</strong> {{ $invoice->c_name }}</span>
                <span><strong>Address:</strong> {{ $invoice->address }}</span>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Hour</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice_services as $service)
                <tr>
                    <td>{{ $service->s_name }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->hour }}</td>
                    <td>{{ $service->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="invoice-summary">
            <p>Invoice Amount: <strong>{{ $invoice->invoice_amount }}</strong></p>
            <p>Invoice Discount: <strong>{{ $invoice->invoice_discount }}</strong></p>
            <p>Total VAT: <strong>{{ $invoice->total_vat }}</strong></p>
            <p class="total">Grand Total: {{ $invoice->grand_total }}</p>
        </div>

        <div class="footer">
            <p>Thank you for choosing us! We appreciate your business.</p>
        </div>
    </div>
</body>
</html>
