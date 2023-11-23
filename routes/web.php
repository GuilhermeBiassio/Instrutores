<?php

use App\Http\Controllers\InstrutoresController;
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
    return to_route('instrutores.create');
});

Route::get('/acidentes/create', [InstrutoresController::class, 'create'])->name('instrutores.create');
Route::get('/escala/create', [InstrutoresController::class, 'create'])->name('instrutores.create');

//Route::resource("/instrutores", InstrutoresController::class);
Route::controller(InstrutoresController::class)->group(function () {
    Route::prefix("instrutores")->group(function () {
        Route::get("/", 'index')->name('instrutores.index');
        Route::get("/create", "create")->name('instrutores.create');
        Route::post("/", "store")->name('instrutores.store');
        Route::get("/{instrutores}/edit", "edit")->name('instrutores.edit');
        Route::get("/search", "search")->name('instrutores.search');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
