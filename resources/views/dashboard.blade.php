<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<h1>Добро пожаловать на панель управления!</h1>
<p>Вы успешно вошли в систему, {{ Auth::user()->name }}.</p>
</body>
</html>
