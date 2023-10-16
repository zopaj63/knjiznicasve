<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClanController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\PosudbaController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::resource("clans", ClanController::class);
    Route::resource("knjigas", KnjigaController::class);
    Route::resource("posudbas", PosudbaController::class);

    Route::get("/clans/{clan}/confirmDelete", [ClanController::Class, "confirmDelete"])->name("clans.confirm-delete");

    Route::get("/knjigas/{knjiga}/confirmDelete", [KnjigaController::Class, "confirmDelete"])->name("knjigas.confirm-delete");
});
