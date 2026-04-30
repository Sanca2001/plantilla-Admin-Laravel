<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

//rutas para ajustes

Route::get('/admin/ajustes',[App\Http\Controllers\AjustesController::class, 'index'])->name('admin.ajustes.index');


//ruta para guardar los ajustes
Route::post('/admin/ajustes',[App\Http\Controllers\AjustesController::class, 'store'])->name('admin.ajustes.store');





