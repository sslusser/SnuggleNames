<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-error', function () {
    Log::error('Test error triggered!');
    abort(500, 'This is a forced error.');
});

Route::get('/generate-name', [NameController::class, 'generate']);

Route::get('/name-generator', function () {
    return view('name-generator');
});

