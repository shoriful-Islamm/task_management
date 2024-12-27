<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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


Route::middleware(['auth', 'verified'])->group(function () {
    //task Start
    Route::get('dashboard', [TaskController::class, 'list'])->name('dashboard');
    Route::get('task/create', [TaskController::class, 'create'])->name('task_create');
    Route::post('task/store', [TaskController::class, 'store'])->name('task_store');
    Route::get('task/edit/{id}', [TaskController::class, 'edit'])->name('task_edit');
    Route::post('task/update/{id}', [TaskController::class, 'update'])->name('task_update');
    Route::get('task/delete/{id}', [TaskController::class, 'delete'])->name('task_delete');
    //task End
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
