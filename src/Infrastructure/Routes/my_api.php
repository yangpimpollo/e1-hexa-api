<?php

use Illuminate\Support\Facades\Route;
use yangpimpollo\Infrastructure\Http\Controllers\HelloWorldController;

use App\Http\Controllers\BookController;


// Route::get('/hello', function () { return response()->json(['message' => 'Hello, API!']); });

Route::get('/hello', HelloWorldController::class);


Route::resource('/books', BookController::class);
