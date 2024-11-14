<!-- resources/views/error.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка доступа</title>
</head>
<body>
<h1>Ошибка доступа</h1>
@if(session('error'))
    <p>{{ session('error') }}</p>
@else
    <p>У вас нет доступа к этому ресурсу.</p>
@endif
<a href="{{ url()->previous() }}">Вернуться назад</a>
</body>
</html>
