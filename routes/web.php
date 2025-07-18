<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'website.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::redirect('/','/home');
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::controller(ContactController::class)->group(function () {
            Route::get('/contact', 'index')->name('contact');
            Route::post('/contact', 'send')->name('contact.store');
        });
        Route::controller(ProductController::class)->group(function () {
            Route::get('/products', 'index')->name('products.index');
            Route::get('category/{id}/products', 'getProductsByCatId')->name('category.products');
            Route::get('/products/{id}', 'showProduct')->name('products.show');
        });

        // about us and quality policy
        Route::get('/about-us', function () {
            return view('website.about-us');
        })->name('aboutus');

        Route::get('/quality-policy', function () {
            return view('website.quality-policy');
        })->name('qualitypolicy');

        Route::get('/after-sale-service', function () {
            return view('website.after-sale-service');
        })->name('aftersaleservice');


        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
    }
);

// Auth::routes();
