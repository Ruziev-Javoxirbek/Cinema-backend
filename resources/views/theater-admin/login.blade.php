<!-- resources/views/theater-admin/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход для администраторов кинотеатров</title>
</head>
<body>
<h1>Вход для администраторов кинотеатров</h1>
<form action="{{ route('admin.login') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required><br>
    <button type="submit">Войти</button>
</form>
</body>
</html>
