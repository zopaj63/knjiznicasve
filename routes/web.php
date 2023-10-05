<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClanController;

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

Route::resource("clans", ClanController::class); // sve rute za CRUD operacije

Route::get("/clans/{clan}/confirmDelete", [ClanController::Class, "confirmDelete"])->name("clans.confirm-delete");
