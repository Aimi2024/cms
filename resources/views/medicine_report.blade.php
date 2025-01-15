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
    <h1>Deducted Medicine Report</h1>
    <p>Generated on: {{ now()->format('F j, Y, g:i a') }}</p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date Added</th>
                <th>Stock Deducted</th>
                <th>Reason</th>
                <th>Deducted Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicines as $medicine)
            <tr>
                <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->created_at }}</td>
                    <td>{{ $medicine->quantity_deducted }}</td>
                    <td>{{ $medicine->medicine_deduct_reason}}</td>
                    <td>{{ $medicine->deducted_at }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>
