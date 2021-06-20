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
Route::resource('files', FileController::class);
Route::post('files-import-google-drive', [FileController::class,'dirveImport'])->name('drive.import');

Route::get('drive-contents', [GoogleServiceController::class, 'driveAssets'])->name('drive.contents');




Route::get('get', function () {
    $filename = 'test.txt';

    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));

    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // there can be duplicate file names!

    //return $file; // array with file info

    $rawData = Storage::cloud()->get($file['path']);

    Storage::disk('public')->put($filename, $rawData);

    return response($rawData, 200)
        ->header('ContentType', $file['mimetype'])
        ->header('Content-Disposition', "attachment; filename=$filename");
});

/** Routes for google drive */

Route::get('/redirect/google', [GoogleServiceController::class, 'redirectToAuth'])->name('google.auth');
Route::get('/google/callback', [GoogleServiceController::class, 'handleCallback'])->name('google.callback');

require __DIR__.'/auth.php';
