<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ListingController;



Route::get('/', [PagesController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin Area
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');

    //Categories
    Route::resource('categories', CategoryController::class)->except(['show']);

    //Ads
    Route::get('ads', [AdController::class, 'index'])->name('ads.index');
    Route::get('ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('ads/store', [AdController::class, 'store'])->name('ads.store');
    Route::get('ads/edit/{id}', [AdController::class, 'edit'])->name('ads.edit');
    Route::get('ads/show/{id}', [AdController::class, 'show'])->name('ads.show');
    Route::put('ads/update/{id}', [AdController::class, 'update'])->name('ads.update');
    Route::delete('ads/destroy/{id}', [AdController::class, 'destroy'])->name('ads.destroy');
    Route::get('ads/myads', [AdController::class, 'myads'])->name('ads.myads');

    //Users Management
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('users/update/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('users/destroy/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});


//Ads Frontend
Route::get('single_ad/{id}', [PagesController::class, 'singlead']);

// Listing
Route::get('listing', [ListingController::class, 'index'])->name('listing.index');


//Category Frontend
Route::get('category', [PagesController::class, 'category']);
Route::get('category/{slug}', [PagesController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{ad_slug}', [PagesController::class, 'adview']);
