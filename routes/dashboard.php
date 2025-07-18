<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\CatalogController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        ################################## Auth ####################################
        Route::get('login',   [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login',  [LoginController::class, 'login'])->name('login.post');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');


        #------------------------------- Protected Routes -------------------------------#
        Route::group(['middleware' => 'auth:web'], function () {

            ################################ Welcome Routes ###############################
            Route::get('welcome', [HomeController::class, 'index'])->name('index');

            ################################ Categories Routes ###############################
            Route::resource('categories', CategoryController::class)->except('show', 'create', 'edit');
            Route::get('categories-all', [CategoryController::class, 'getAll'])->name('categories.all');

            ################################ Products Routes ###############################
            Route::resource('products', ProductController::class)->except('show', 'create');
            Route::get('products-all', [ProductController::class, 'getAll'])->name('products.all');
            Route::post('products-image-delete/{id}', [ProductController::class, 'deleteImage'])
                ->name('products.image.delete');

            ################################ contacts Routes ###############################
            Route::controller(ContactController::class)->group(function () {
                Route::get('contacts', 'index')->name('contacts.index');
                Route::get('contacts-all','getAll')->name('contacts.all');
                Route::delete('contacts/{id}', 'destroy')->name('contacts.destroy');
            });
             ################################ settings Routes ###############################
             Route::controller(SettingController::class)->group(function () {
                Route::get('settings', 'index')->name('settings.index');
                Route::Put('settings/{id}', 'update')->name('settings.update');
            });
            ################################ sliders Routes ###############################
            Route::controller(SliderController::class)->group(function () {
                Route::get('sliders', 'index')->name('sliders.index');
                Route::post('sliders', 'store')->name('sliders.store');
                Route::post('sliders-image-delete/{id}','deleteImage')
                  ->name('sliders.image.delete');
            });
            ################################ profile Routes ###############################
            Route::controller(ProfileController::class)->group(function () {
                Route::get('profile', 'index')->name('profile.index');
                Route::Put('profile/{id}', 'update')->name('profile.update');
            });
             ################################ catalog Routes ###############################
             Route::controller(CatalogController::class)->group(function () {
                Route::get('catalog', 'index')->name('catalog.index');
                Route::post('catalog', 'store')->name('catalog.store');
            });



        });
    }
);
