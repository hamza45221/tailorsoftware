<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'dashboard'], function () {

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::group(['prefix'=>'user'], function () {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');

        Route::get('/fetch',[\App\Http\Controllers\Admin\UserController::class,'fetch'])->name('admin.user.fetch');
        Route::post('/store',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('admin.user.store');
        Route::post('/delete-multiple',[\App\Http\Controllers\Admin\UserController::class,'deleteMultiple'])->name('admin.user.delete.multiple');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'delete'])->name('admin.user.delete');

    });


    Route::group(['prefix'=>'customer'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customer');

        Route::get('/fetch',[\App\Http\Controllers\Admin\CustomerController::class,'fetch'])->name('admin.customer.fetch');
        Route::post('/store',[\App\Http\Controllers\Admin\CustomerController::class,'store'])->name('admin.customer.store');
        Route::post('/delete-multiple',[\App\Http\Controllers\Admin\CustomerController::class,'deleteMultiple'])->name('admin.customer.delete.multiple');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CustomerController::class,'delete'])->name('admin.customer.delete');

    });



    Route::group(['prefix'=>'order'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.order');

        Route::get('/fetch',[\App\Http\Controllers\Admin\CustomerController::class,'fetch'])->name('admin.order.fetch');
        Route::post('/store',[\App\Http\Controllers\Admin\CustomerController::class,'store'])->name('admin.order.store');
        Route::post('/delete-multiple',[\App\Http\Controllers\Admin\CustomerController::class,'deleteMultiple'])->name('admin.order.delete.multiple');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CustomerController::class,'delete'])->name('admin.order.delete');

    });

});


