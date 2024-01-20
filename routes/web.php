<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::controller(BannerController::class)->group(function () {
    Route::get('/all/banner', 'AllBanner')->name('all.banner');
    Route::get('/add/banner', 'AddBanner')->name('add.banner');
    Route::post('/store/banner', 'StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}', 'EditBanner')->name('edit.banner');
    Route::post('/update/banner', 'UpdateBanner')->name('update.banner');
    Route::get('/delete/banner/{id}', 'DeleteBanner')->name('delete.banner');
});
