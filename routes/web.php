<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
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

Route::controller(MenuController::class)->group(function () {
    Route::get('/all/menu', 'AllMenu')->name('all.menu');
    Route::get('/add/menu', 'AddMenu')->name('add.menu');
    Route::post('/store/menu', 'StoreMenu')->name('store.menu');
    Route::get('/edit/menu/{id}', 'EditMenu')->name('edit.menu');
    Route::post('/update/menu', 'UpdateMenu')->name('update.menu');
    Route::get('/delete/menu/{id}', 'DeleteMenu')->name('delete.menu');
});

Route::controller(SubmenuController::class)->group(function () {
    Route::get('/all/sub-menu', 'AllSubMenu')->name('all.subMenu');
    Route::get('/add/sub-menu', 'AddSubMenu')->name('add.subMenu');
    Route::post('/store/sub-menu', 'StoreSubMenu')->name('store.subMenu');
    Route::get('/edit/sub-menu/{id}', 'EditSubMenu')->name('edit.subMenu');
    Route::post('/update/sub-menu', 'UpdateSubMenu')->name('update.subMenu');
    Route::get('/delete/sub-menu/{id}', 'DeleteSubMenu')->name('delete.subMenu');
});