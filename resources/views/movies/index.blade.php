<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список фильмов</title>
</head>
<body>
<!-- resources/views/movies/index.blade.php -->
@extends('layout')

@section('title', 'Список фильмов')

@section('content')
    <div class="container">
        <h1 class="mb-4">Список фильмов</h1>
        <ul class="list-group">
            @foreach($movies as $movie)
                <li class="list-group-item">
                    <strong>{{ $movie->title }}</strong> - {{ $movie->description }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection

</body>
</html>
