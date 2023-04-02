<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::controller(TaskController::class)->group(function () {
    Route::get('tasks', 'index');
    Route::post('tasks', 'store');
    Route::delete('tasks/{task}', 'destroy');
});