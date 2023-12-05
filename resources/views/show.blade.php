<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show CSV Data</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>CSV Data</h1>
    <table>
        <tr>
            <th>ID</th>
            @foreach ($dataAttributes as $attribute)
                <th>{{ $attribute->attribute }}</th>
            @endforeach
        </tr>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                @foreach ($dataAttributes as $attribute)
                    <td>
                        {{ optional($row->attributes->where('attribute', $attribute->attribute)->first())->value }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>
