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

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'] )->name('index');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/document/{document}', [HomeController::class, 'show'])->name('show');

Route::get('/signin', [HomeController::class, 'signin'] )->name('signin');
Route::post('/signin', [HomeController::class, 'login'] )->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// Route::prefix('admin')->group(function () {
//     Route::namespace('Admin')->group(function() {
//         Route::get('/', DashboardController::class)->name('dashboard');
//         Route::resource('document', DocumentController::class);
//         Route::resource('documentFile', DocumentFileController::class);
//         Route::get('document-convertion/{file}', DocumentConvertionController::class)->name('convertion.file');
//         Route::post('delete/file', 'DocumentController@fileDestroy')->name('delete.file');
//         Route::resource('user', UserController::class);
//         Route::resource('quotation', QuotationController::class);
//     });
// });

Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});