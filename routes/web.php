<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ImageController;

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
Route::get('search',[SearchController::class,'search']);

Route::get('autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');

Route::get('/index', [PostController::class,'index'])->name('index');
Route::get('/add', [PostController::class,'add'])->name('add');
Route::post('/store', [PostController::class,'store'])->name('store');

Route::controller(ImageController::class)->group(function(){
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});
