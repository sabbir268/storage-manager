<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GoogleServiceController;
use App\Http\Controllers\SubCategoryController;
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


Route::get('/dashboard', [FileController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::resource('category', CategoryController::class)->except('show');
Route::resource('subcategory', SubCategoryController::class)->except('show');
Route::resource('files', FileController::class)->except('index');
Route::post('files-import-google-drive', [FileController::class,'dirveImport'])->name('drive.import');
Route::get('file-download/{file}', [FileController::class, 'fileDownload'])->name('files.download');

Route::get('drive-contents', [GoogleServiceController::class, 'driveAssets'])->name('drive.contents');


/** Routes for google drive */

Route::get('/redirect/google', [GoogleServiceController::class, 'redirectToAuth'])->name('google.auth');
Route::get('/google/callback', [GoogleServiceController::class, 'handleCallback'])->name('google.callback');

require __DIR__.'/auth.php';
