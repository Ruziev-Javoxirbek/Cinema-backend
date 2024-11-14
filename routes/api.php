<?php

use App\Http\Controllers\MovieApiController;
use App\Http\Controllers\SessionApiController;
use App\Http\Controllers\TheaterApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/sessions', [SessionApiController::class, 'index']);
Route::get('/sessions/{id}', [SessionApiController::class, 'show']);

Route::get('/movies', [MovieApiController::class, 'index']);
Route::get('/movies/{id}', [MovieApiController::class, 'show']);

Route::get('/theaters', [TheaterApiController::class, 'index']);
Route::get('/theaters/{id}', [TheaterApiController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
