<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentConvertionController;
use App\Http\Controllers\UserController;
use App\Models\DocumentFile;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', DashboardController::class)->name('dashboard');
Route::resource('document', DocumentController::class);
Route::resource('documentFile', DocumentFile::class);
Route::get('document-convertion/{file}', DocumentConvertionController::class)->name('convertion.file');
Route::post('delete/file', [DocumentController::class, 'fileDestroy'])->name('delete.file');
Route::resource('user', UserController::class);