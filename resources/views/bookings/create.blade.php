<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Бронирование билетов - {{ $session->movie->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<div class="container mt-5">
    <h1>Бронирование билетов на фильм: {{ $session->movie->title }}</h1>
    <p>Кинотеатр: {{ $session->theater->name }}</p>
    <p>Дата: {{ $session->date }}</p>
    <p>Время: {{ $session->time }}</p>
    <p>Цена билета: {{ $session->ticket_price }}₽</p>

    <form action="{{ route('book-ticket', ['sessionId' => $session->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество мест</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="{{ $session->available_seats }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Забронировать</button>
    </form>
</div>
</body>
</html>
