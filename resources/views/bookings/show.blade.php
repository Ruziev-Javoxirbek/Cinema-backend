<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Билеты для пользователя</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/welcome">My App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/cities">Города</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/theaters">Кинотеатры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/movies">Фильмы</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link">Добро пожаловать, {{ Auth::user()->name }}!</span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-- resources/views/bookings/show.blade.php -->
    <h1 style="font-family: Arial, sans-serif; color: #333;">Билеты для пользователя: {{ $user->name }}</h1>

    <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; color: #333;">
        <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Фильм</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Кинотеатр</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Дата</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Время</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Цена</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Количество</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Итого за билет</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->sessions as $session)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $session->movie->title }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $session->theater->name }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $session->date }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $session->time }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $session->pivot->price }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $session->pivot->quantity }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $session->pivot->price * $session->pivot->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 style="font-family: Arial, sans-serif; color: #333; margin-top: 20px;">Итого: {{ $total->total }}</h2>

</body>
</html>
