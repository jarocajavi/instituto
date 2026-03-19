<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::view("sobre_nosotros", "about")->name("about");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post("set_lang", LangController::class)->name("set_lang");

require __DIR__ . '/auth.php';

// CRUD genérico protegido por auth + rol
Route::middleware(['auth', \App\Http\Middleware\CheckResourceRole::class])->group(function () {
    Route::get("{resource}",             [CrudController::class, "index"])->name("crud.index");
    Route::get("{resource}/create",      [CrudController::class, "create"])->name("crud.create");
    Route::post("{resource}",            [CrudController::class, "store"])->name("crud.store");
    Route::delete("{resource}/{id}",     [CrudController::class, "destroy"])->name("crud.destroy");
    Route::get("{resource}/{id}/edit",   [CrudController::class, "edit"])->name("crud.edit");
    Route::put("{resource}/{id}",        [CrudController::class, "update"])->name("crud.update");
});

Route::fallback(function () {
    $url = request()->path();
    return "<h1>Esta página $url no existe</h1>";
});
