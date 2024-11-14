<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать новый сеанс</title>
</head>
<body>
<!-- resources/views/sessions/create.blade.php -->
@extends('layout')

@section('title', 'Create Session')

@section('content')
    <div class="container">
        <h1>Create New Session</h1>
        <form action="/sessions" method="POST">
            @csrf
            <div class="form-group">
                <label for="movie_id">Movie:</label>
                <select name="movie_id" id="movie_id" class="form-control">
                    @foreach($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="theater_id">Theater:</label>
                <select name="theater_id" id="theater_id" class="form-control">
                    @foreach($theaters as $theater)
                        <option value="{{ $theater->id }}">{{ $theater->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" name="time" id="time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ticket_price">Ticket Price:</label>
                <input type="number" name="ticket_price" id="ticket_price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

</body>
</html>
