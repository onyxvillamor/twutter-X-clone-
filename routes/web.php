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

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/contents/{content}',[ContentController::class, 'show'])->name('contents.show');

Route::get('/contents/{content}/edit',[ContentController::class, 'edit'])->name('contents.edit');

Route::put('/contents/{content}',[ContentController::class, 'update'])->name('contents.update');

Route::post('/contents',[ContentController::class, 'store'])->name('contents.store');

Route::delete('/contents/{id}',[ContentController::class, 'destroy'])->name('contents.destroy');

Route::post('/contents/{content}/comments',[CommentController::class, 'store'])->name('contents.comments.store');

Route::get('/register',[AuthController::class, 'register'])->name('register');

Route::post('/register',[AuthController::class, 'store']);

Route::get('/login',[AuthController::class, 'login'])->name('login');

Route::post('/login',[AuthController::class, 'authenticate']);

Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/terms',function(){
    return view('terms');
});


