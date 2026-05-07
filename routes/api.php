<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojocApiController;

Route::delete('/videojocs/deleteall', [VideojocApiController::class, 'destroyAll']);

Route::get('/videojocs',              [VideojocApiController::class, 'index']);
Route::get('/videojocs/{id}',         [VideojocApiController::class, 'show']);
Route::post('/videojocs',             [VideojocApiController::class, 'store']);
Route::put('/videojocs/{id}',         [VideojocApiController::class, 'update']);
Route::delete('/videojocs/{id}',      [VideojocApiController::class, 'destroy']);
