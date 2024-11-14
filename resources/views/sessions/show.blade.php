<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Информация о сеансе</title>
</head>
<body>
<!-- resources/views/sessions/show.blade.php -->
    <h1>Информация о сеансе</h1>
    <p>Фильм: {{ $session->movie->title }}</p>
    <p>Кинотеатр: {{ $session->theater->name }}</p>
    <p>Дата: {{ $session->date }}</p>
    <p>Время: {{ $session->time }}</p>
    <p>Цена билета: {{ $session->ticket_price }}</p>
</body>
</html>
