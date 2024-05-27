<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'create'])->name('task.create');
Route::post('/create', [RegisterController::class, 'store'])->name('task.store');
Route::get('/view', [RegisterController::class, 'view'])->name('task.view');
Route::patch('/complete/{id}', [RegisterController::class, 'complete'])->name('task.complete');
Route::patch('/incomplete/{id}', [RegisterController::class, 'incomplete'])->name('task.incomplete');
Route::delete('/delete/{id}', [RegisterController::class, 'destroy'])->name('task.delete');
Route::get('/edit/{id}', [RegisterController::class, 'edit'])->name('task.edit');
Route::patch('/update/{id}', [RegisterController::class, 'update'])->name('task.update');
