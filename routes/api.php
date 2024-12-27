<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // Task Routes
    Route::get('dashboard', [TaskController::class, 'list'])->name('dashboard');
    Route::get('task/create', [TaskController::class, 'create'])->name('task_create');
    Route::post('task/store', [TaskController::class, 'store'])->name('task_store');
    Route::get('task/edit/{id}', [TaskController::class, 'edit'])->name('task_edit');
    Route::post('task/update/{id}', [TaskController::class, 'update'])->name('task_update');
    Route::get('task/delete/{id}', [TaskController::class, 'delete'])->name('task_delete');
});
