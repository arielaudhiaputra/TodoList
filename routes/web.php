<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'login');



Route::middleware('auth')->group(function () {
    Route::get('/dashoard', [ListController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/store', [ListController::class, 'store'])->name('store');
    Route::get('/dashboard/update', [ListController::class, 'update'])->name('update.list');
    Route::get('/dashboard/delete', [ListController::class, 'delete'])->name('delete.list');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
