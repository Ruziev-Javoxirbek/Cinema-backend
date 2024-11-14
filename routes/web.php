<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Вход в систему
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Главная страница после входа
Route::get('/welcome', function () {
    return view('auth.welcome');
})->middleware('auth');

// Общие маршруты для аутентифицированных пользователей
Route::middleware(['auth'])->group(function () {
    // Маршруты для городов
    Route::get('/cities', [CityController::class, 'index']);
    Route::get('/cities/{id}', [CityController::class, 'show']);

    // Маршруты для кинотеатров
    Route::get('/theaters', [TheaterController::class, 'index']);
    Route::get('/theaters/{id}', [TheaterController::class, 'show']);

    // Маршруты для фильмов
    Route::get('/movies', [MovieController::class, 'index']);
    Route::get('/movies/{id}', [MovieController::class, 'show']);

    // Маршруты для бронирования билетов
    Route::get('/sessions/{sessionId}/book', [BookingController::class, 'showBookingForm'])->name('book-ticket');
    Route::post('/sessions/{sessionId}/book', [BookingController::class, 'storeBooking']);
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/users/{id}/bookings', [BookingController::class, 'show']);
});

// Маршруты для администраторов кинотеатров с проверкой роли
Route::middleware(['auth', 'role:theater_admin'])->group(function () {
    // Управление сеансами
    Route::get('/sessions', [SessionController::class, 'index']);
    Route::get('/sessions/create', [SessionController::class, 'create']);
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::get('/sessions/{id}', [SessionController::class, 'show']);
    Route::get('/sessions/{id}/edit', [SessionController::class, 'edit']);
    Route::put('/sessions/{id}', [SessionController::class, 'update']);
    Route::delete('/sessions/{id}', [SessionController::class, 'destroy'])->name('sessions.destroy');
    Route::get('/sessions/{id}/destroy', [SessionController::class, 'destroy']);
});

// Маршрут для ошибки доступа
Route::get('/error', function () {
    return view('error');
})->name('error');




/*
use App\Http\Controllers\CityController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TheaterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;

// Вход в систему
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/welcome', function () {
    return view('auth.welcome');
})->middleware('auth');

// Общие маршруты, доступные только для аутентифицированных пользователей
Route::middleware(['auth'])->group(function () {
    // Маршруты для городов
    Route::get('/cities', [CityController::class, 'index']);
    Route::get('/cities/{id}', [CityController::class, 'show']);

    // Маршруты для кинотеатров
    Route::get('/theaters', [TheaterController::class, 'index']);
    Route::get('/theaters/{id}', [TheaterController::class, 'show']);

    Route::get('/sessions/{sessionId}/book', [BookingController::class, 'showBookingForm'])->name('book-ticket');
    Route::post('/sessions/{sessionId}/book', [BookingController::class, 'storeBooking']);

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');


    // Маршруты для фильмов
    Route::get('/movies', [MovieController::class, 'index']);
    Route::get('/movies/{id}', [MovieController::class, 'show']);
});



// Маршруты для администраторов кинотеатров с проверкой роли
Route::middleware(['auth', 'role:theater_admin'])->group(function () {
    // Управление сеансами
    Route::get('/sessions', [SessionController::class, 'index']);
    Route::get('/sessions/create', [SessionController::class, 'create']);
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::get('/sessions/{id}', [SessionController::class, 'show']);
    Route::get('/sessions/{id}/edit', [SessionController::class, 'edit']);
    Route::put('/sessions/{id}', [SessionController::class, 'update']);
    Route::delete('/sessions/{id}', [SessionController::class, 'destroy'])->name('sessions.destroy');
    Route::get('/sessions/{id}/destroy', [SessionController::class, 'destroy']); // Это можно оставить для совместимости
});

// Маршруты для бронирования доступны для всех аутентифицированных пользователей
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::get('/users/{id}/bookings', [BookingController::class, 'show']);
});

// Маршрут ошибки доступа
Route::get('/error', function () {
    return view('error');
})->name('error');

*/


