<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');


require __DIR__.'/settings.php';

//ruta para el admin
Route::get('/dashboard', function(){return redirect()->route('admin.index');})->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware(['auth', 'verified']);


//rutas para ajustes
Route::get('/admin/ajustes',[App\Http\Controllers\AjustesController::class, 'index'])->name('admin.ajustes.index')->middleware(['auth', 'verified']);
//ruta para guardar los ajustes
Route::post('/admin/ajustes',[App\Http\Controllers\AjustesController::class, 'store'])->name('admin.ajustes.store')->middleware(['auth', 'verified']);

//ruta para los roles
Route::get('/admin/roles',[App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware(['auth', 'verified']);
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware(['auth', 'verified']);
Route::patch('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware(['auth', 'verified']);
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware(['auth', 'verified']);


//rutas para los usuarios
Route::get('/admin/users',[App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index')->middleware(['auth', 'verified']);

Route::get('/admin/users/create',[App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create')->middleware(['auth', 'verified']);