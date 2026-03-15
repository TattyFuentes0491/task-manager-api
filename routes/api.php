<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/items', [TaskController::class, 'fctGetItems']);

Route::get('/items/{id}', [TaskController::class, 'fctGetItemsById']);

Route::post('/items', [TaskController::class, 'fctPostItems']);

Route::put('/items/{id}', [TaskController::class, 'fctPutItemById']);

Route::delete('/items/{id}', [TaskController::class, 'fctDeleteItemById']);

Route::get('/external-posts', [TaskController::class, 'fctExternalPosts']);