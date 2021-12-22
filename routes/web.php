<?php

// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\DocumentController;
// use App\Http\Controllers\DocumentConvertionController;
// use App\Http\Controllers\UserController;
// use App\Models\DocumentFile;
// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'] )->name('index');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/document/{document}', [HomeController::class, 'show'])->name('show');

Route::get('/signin', [HomeController::class, 'signin'] )->name('signin');
Route::post('/signin', [HomeController::class, 'login'] )->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/document/show/{document}', [DocumentController::class, 'show'])->name('document.show');

Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/document', [DocumentController::class, 'index'])->name('document.index');
    Route::get('/document/create', [DocumentController::class, 'create'])->name('document.create');
    Route::post('/document/store', [DocumentController::class, 'store'])->name('document.store');
    Route::delete('/document/destroy/{document}', [DocumentController::class, 'destroy'])->name('document.destroy');
    Route::put('/document/update/{document}', [DocumentController::class, 'update'])->name('document.update');

    Route::post('delete/file', [DocumentController::class, 'fileDestroy'])->name('delete.file');
    Route::get('document-convertion/{file}', [DocumentConvertionController::class, '_invoke'])->name('convertion.file');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/update-about', [ProfileController::class, 'updateAbout'])->name('about.update');
    Route::put('/update-profile/{user}', [ProfileController::class, 'updateProfile'])->name('profile.update');
});