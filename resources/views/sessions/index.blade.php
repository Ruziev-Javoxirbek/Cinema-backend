<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список сеансов</title>
</head>
<body>
<!-- resources/views/sessions/index.blade.php -->
<!-- resources/views/sessions/index.blade.php -->
@extends('layout')

@section('title', 'Sessions List')

@section('content')
    <h1 class="mb-4">Sessions List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Movie</th>
            <th>Theater</th>
            <th>Date</th>
            <th>Time</th>
            <th>Ticket Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{ $session->movie->title }}</td>
                <td>{{ $session->theater->name }}</td>
                <td>{{ $session->date }}</td>
                <td>{{ $session->time }}</td>
                <td>{{ $session->ticket_price }}</td>
                <td>
                    <a href="/sessions/{{ $session->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sessions->links() }}
@endsection
</body>
</html>
