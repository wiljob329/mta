<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('homepage');
});

Route::get('/registrar', function () {
    return view('register');
});

//Routes de Usuario
Route::post('/registro', [UserController::class, 'registro']);
Route::post('/login', [UserController::class, 'login']);




