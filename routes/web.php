<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;

// ==========================================
// RECURSOS CRUD (generan 7 rutas automáticas)
// ==========================================
Route::resource("projects", ProjectController::class)->middleware('auth');
Route::resource("teachers", TeacherController::class)->middleware('auth');
Route::resource('students', StudentController::class)->middleware('auth');

// ==========================================
// RUTAS ESTÁTICAS (solo muestran una vista)
// ==========================================
Route::get('/',[MainController::class,'index'])->name('main');
Route::view("sobre_nosotros", "about")->name("about");
Route::view("noticias", "noticias");
Route::view("alumnos", "alumnos");
Route::view("profesores", "profesores");

// ==========================================
// RUTAS DE PRUEBA / EXPERIMENTALES
// ==========================================
Route::get("/alumno/{numero?}/{seccion?}", fn($numero =10, $seccion="nada" ) => view("alumno", ["numero" => $numero, "seccion" => $seccion]));

// ==========================================
// RUTAS DE AUTENTICACIÓN (generadas por Breeze/Jetstream)
// ==========================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================================
// RUTAS DE PERFIL (agrupadas bajo middleware auth)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ==========================================
// RUTA FALLBACK (se ejecuta si no existe la ruta solicitada)
// ==========================================
Route::fallback(function () {
    $url = request()->path();
    return ("<h1>Esta página $url no existe</h1>");
});

// ==========================================
// RUTAS ESPECIALES / UTILIDADES
// ==========================================
Route::post("set_lang",LangController::class)->name("set_lang");

Route::resource("projects", ProjectController::class)->middleware('auth');
Route::resource("teachers", ProjectController::class)->middleware('auth');
Route::resource("students", ProjectController::class)->middleware('auth');
Route::resource("registered", ProjectController::class)->middleware('auth');

