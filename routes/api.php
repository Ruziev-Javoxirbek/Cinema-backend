<?php

use App\Http\Controllers\CityApiController;
use App\Http\Controllers\MovieApiController;
use App\Http\Controllers\SessionApiController;
use App\Http\Controllers\TheaterApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/sessions', [SessionApiController::class, 'index']);
    Route::get('/sessions_total', [SessionApiController::class, 'total']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/movies', [MovieApiController::class, 'index']);
Route::get('/movies_total', [MovieApiController::class, 'total']);

Route::get('/cities', [CityApiController::class, 'index']);
Route::get('/cities_total', [CityApiController::class, 'total']);

Route::get('/theaters', [TheaterApiController::class, 'index']);
Route::get('/theaters_total', [TheaterApiController::class, 'total']);

/*--------------------------------------------------------------*/

Route::get('/cities', [CityApiController::class, 'index']);
Route::get('/cities/{id}', [CityApiController::class, 'show']);

Route::get('/movies', [MovieApiController::class, 'index']);
Route::get('/movies/{id}', [MovieApiController::class, 'show']);

Route::get('/theaters', [TheaterApiController::class, 'index']);
Route::get('/theaters/{id}', [TheaterApiController::class, 'show']);


//Route::get('/sessions', [SessionApiController::class, 'index']);
//Route::get('/sessions/{id}', [SessionApiController::class, 'show']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//    Route::get('/sessions', [SessionApiController::class, 'index']);
//    Route::get('/sessions/{id}', [SessionApiController::class, 'show']);
