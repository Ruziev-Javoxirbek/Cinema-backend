<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход для пользователей</title>
</head>
<body>
<h1>Вход для пользователей</h1>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required><br>
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Logout</button>
    </form>
</form>
</body>
</html>
