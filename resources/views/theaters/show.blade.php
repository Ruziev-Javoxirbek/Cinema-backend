<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $theater->name }} - Сеансы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/welcome">My App</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/cities">Города</a></li>
                <li class="nav-item"><a class="nav-link" href="/theaters">Кинотеатры</a></li>
                <li class="nav-item"><a class="nav-link" href="/movies">Фильмы</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><span class="nav-link">Добро пожаловать, {{ Auth::user()->name }}!</span></li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h1 class="text-center mb-4">{{ $theater->name }} - Сеансы</h1>
    <ul class="list-group">
        @foreach($theater->sessions as $session)
            <li class="list-group-item">
                <h5>Фильм: <strong>{{ $session->movie->title }}</strong></h5>
                <p>Дата: {{ $session->date }}</p>
                <p>Время: {{ $session->time }}</p>
                <p>Цена билета: {{ $session->ticket_price }}₽</p>
                <a href="{{ route('book-ticket', ['sessionId' => $session->id]) }}" class="btn btn-primary mt-3">Бронировать билет</a>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
