<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\SolicitudController;
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
Route::post('/login', [UserController::class, 'store'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/homepage', [UserController::class, 'homepage'])->name('home')->middleware('auth');
Route::post('/solicitud', [SolicitudController::class, 'store'])->name('solicitud')->middleware('auth');


//Routes de Usuario
Route::get('/registro', [RegistroController::class, 'create'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.post');
Route::post('/parroquias', [RegistroController::class, 'parroquias'])->name('parroquias');

//Reset de contraseña
Route::get('/reset-password',[ResetPassword::class, 'create'])->name('reset');
Route::post('/reset-password',[ResetPassword::class, 'store'])->name('reset.post');
Route::get('/user-reset-password/{token}',[ResetPassword::class, 'resetPassUser'])->name('reset.pass.user');
Route::post('/user-reset-password/{token}',[ResetPassword::class, 'resetPassUserPost'])->name('reset.pass.user.post');



