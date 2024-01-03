<?php

use Illuminate\Support\Facades\Route;

//dodati kontroler
use App\Http\Controllers\KnjigeController;

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
    return view('welcome');
});

//ruta za sve CRUD operacije
Route::resource("PopisProcitanog", KnjigeController::class);