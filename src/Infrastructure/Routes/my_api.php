<?php

use Illuminate\Support\Facades\Route;
use yangpimpollo\Infrastructure\Http\Controllers\GetHelloWorld;


// Route::get('/hello', function () { return response()->json(['message' => 'Hello, API!']); });

Route::get('/hello', GetHelloWorld::class);