<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Фильмы</title>
</head>
<body>
<!-- resources/views/movies/show.blade.php -->
@extends('layout')

@section('title', 'Фильм')

@section('content')
    <div class="container">
        <h1>Фильм: {{ $movie->title }}</h1>
        <p>{{ $movie->description }}</p>
        <p><strong>Продолжительность:</strong> {{ $movie->duration }} минут</p>

        <h3 class="mt-4">Сеансы:</h3>
        <ul class="list-group">
            @foreach($movie->sessions as $session)
                <li class="list-group-item">
                    <strong>Кинотеатр:</strong> {{ $session->theater->name }} <br>
                    <strong>Дата:</strong> {{ $session->date }} <br>
                    <strong>Время:</strong> {{ $session->time }} <br>
                    <strong>Цена билета:</strong> {{ $session->ticket_price }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection

</body>
</html>
