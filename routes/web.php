<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Auth\RegisterController;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Ruta pentru a afișa lista de task-uri
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::resource('tasks', TaskController::class)->except(['index']);
});
    // Ruta pentru aprobarea unui task (metoda PUT)
Route::middleware(['auth', 'checkUserType:editor'])->group(function () {
    Route::put('tasks/approve/{id}', [TaskController::class, 'approveTask'])->name('tasks.approve');
});



    // Ruta pentru a accesa pagina de înregistrare
    Route::get('/', [RegisterController::class, 'index'])->name('auth.register');

    // Ruta pentru a afișa lista de sites
    Route::get('/sites', [SiteController::class, 'index'])->name('sites.list');

    // Ruta pentru a afișa lista de sites cu posibilitatea de a filtra după categorie
    Route::get('/sites/{category?}', [SiteController::class, 'index'])->name('sites.list');

    // Ruta către pagina principală a sites
    Route::get('/sites', [SiteController::class, 'index'])->name('sites');

    // Ruta către pagina de liste de task-uri //Afișează o vizualizare numită 'tasks.list'
    Route::get('home', function () { return view('tasks.list'); })->name('tasks');
    // Ruta către pagina de liste de sites // Afișează o vizualizare numită 'sites'
    Route::get('home', function () { return view('sites'); })->name('sites');

    // Ruta către pagina principală
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Ruta către pagina de liste de task-uri
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
