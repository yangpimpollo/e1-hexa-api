<?php

use Illuminate\Support\Facades\Route;
use yangpimpollo\Infrastructure\Http\Controllers\HelloWorldController;
use yangpimpollo\Infrastructure\Http\Controllers\BookController;

Route::get('/hello', HelloWorldController::class);

Route::apiResource('/books', BookController::class);
