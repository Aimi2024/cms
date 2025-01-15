<!DOCTYPE html>
<html>
<head>
    <title>Deducted Medicine Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Deducted Equipment Report</h1>
    <p>Generated on: {{ now()->format('F j, Y, g:i a') }}</p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Stock Deducted</th>
                <th>Reason</th>
                <th>Date Arrived</th>
                <th>Service Life End</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipment as $equipment)
            <tr>
                <td>{{ $equipment->eqd_name }}</td>
                <td>{{ $equipment->eqd_stock_deducted }}</td>
                <td>{{ $equipment->eq_deduc_reason }}</td>
                <td>{{ $equipment->eq_da }}</td>
                <td>{{ $equipment->eqd_date_deducted ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
