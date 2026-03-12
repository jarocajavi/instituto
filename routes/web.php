<?php

use App\Http\Controllers\MainController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
// Recursos
Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);
Route::resource('projects', ProjectController::class);


Route::get('/',[MainController::class,'index'])->name('main');


Route::view("sobre_nosotros", "about")->name("about");
Route::view("noticias", "noticias");
Route::view("alumnos", "alumnos");
Route::view("profesores", "profesores");


//Pruebas
Route::get("/alumno/{numero?}/{seccion?}", fn($numero =10, $seccion="nada" ) => view("alumno", ["numero" => $numero, "seccion" => $seccion]));


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
Route::fallback(function () {
    $url = request()->path();
    return ("<h1>Esta página $url no existe</h1>");
});
//Route::post("set_lang", [LangController::class, "__invoke"]);
Route::post("set_lang",LangController::class)->name("set_lang");

Route::resource("projects", ProjectController::class)->middleware('auth');
Route::resource("teachers", TeacherController::class)->middleware('auth');





