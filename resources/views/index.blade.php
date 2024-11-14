<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cinema</title>
</head>
<body>
<!-- resources/views/cities/index.blade.php -->
    <h1>Города</h1>
    <ul>
        @foreach($cities as $city)
            <li>{{ $city->name }}</li>
        @endforeach
    </ul>
</body>
</html>
