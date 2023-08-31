<?php

use App\Http\Controllers\RegistroController;
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
// Route::get('/', function () {
//     return view('homepage');
// });
// rutas principales y login
Route::redirect('/', 'login');
Route::get('/login', [UserController::class, 'create'])->name('login.index');
Route::post('/login', [UserController::class, 'store']);


//rutas registro usuario
// Route::get('/registrar', function () {
//     return view('register');
// });

//Routes de Usuario
Route::get('/registro', [RegistroController::class, 'create'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store']);
Route::post('/parroquias', [RegistroController::class, 'parroquias']);




