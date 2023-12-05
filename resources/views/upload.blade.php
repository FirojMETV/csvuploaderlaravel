<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV</title>
</head>
<body>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('csv.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".csv">
        <button type="submit">Upload CSV</button>
    </form>
</body>
</html>
