<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать сеанс</title>
</head>
<body>
<!-- resources/views/sessions/edit.blade.php -->
    <h1>Редактировать сеанс</h1>

    <form action="/sessions/{{ $session->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="movie_id">Фильм:</label>
        <select name="movie_id" id="movie_id">
            @foreach($movies as $movie)
                <option value="{{ $movie->id }}" {{ $movie->id == $session->movie_id ? 'selected' : '' }}>
                    {{ $movie->title }}
                </option>
            @endforeach
        </select>

        <label for="theater_id">Кинотеатр:</label>
        <select name="theater_id" id="theater_id">
            @foreach($theaters as $theater)
                <option value="{{ $theater->id }}" {{ $theater->id == $session->theater_id ? 'selected' : '' }}>
                    {{ $theater->name }}
                </option>
            @endforeach
        </select>

        <label for="date">Дата:</label>
        <input type="date" name="date" id="date" value="{{ $session->date }}" required>

        <label for="time">Время:</label>
        <input type="time" name="time" id="time" value="{{ $session->time }}" required>

        <label for="ticket_price">Цена билета:</label>
        <input type="number" name="ticket_price" id="ticket_price" value="{{ $session->ticket_price }}" required>

        <button type="submit">Сохранить изменения</button>
    </form>
</body>
</html>
