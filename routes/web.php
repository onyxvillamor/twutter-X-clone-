<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
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

Route::get('', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'contents', 'as' => 'contents.'], function () {

    Route::post('', [ContentController::class, 'store'])->name('store');

    Route::get('/{content}', [ContentController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {
        
        Route::get('/{content}/edit', [ContentController::class, 'edit'])->name('edit');

        Route::put('/{content}', [ContentController::class, 'update'])->name('update');

        Route::delete('/{id}', [ContentController::class, 'destroy'])->name('destroy');

        Route::post('/{content}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});


Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function () {
    return view('terms');
});
