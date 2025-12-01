<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'indexLogin')->name('login');
    Route::post('/login/store', 'login')->name('login.store');
});

Route::middleware(['auth', 'role:' . RoleEnum::ADMIN->value])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'indexDashboard')->name('admin.dashboard.index');
        Route::get('/admin/dashboard/filter', 'filterSale')->name('dashboard.sale.filter');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::post('/admin/logout', 'logout')->name('logout');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/admin/dashboard/user', 'indexUser')->name('admin.user.index');
        Route::post('/admin/dashboard/user/create', 'createUser')->name('admin.user.create');
        Route::get('/admin/dashboard/user/{id}/edit/data', 'editUserData')->name('admin.user.edit.data');
        Route::get('/admin/dashboard/user/{id}/edit/password', 'editUserPassword')->name('admin.user.edit.password');
        Route::patch('/admin/dashboard/user/{id}/edit/data', 'updateUserData')->name('admin.user.update.data');
        Route::patch('/admin/dashboard/user/{id}/edit/password', 'updateUserPassword')->name('admin.user.update.password');
        Route::delete('/admin/dashboard/user/{id}/delete', 'deleteUser')->name('admin.user.delete');
    });

    Route::controller(SalesController::class)->group(function () {
       Route::get('/admin/dashboard/sale', 'indexSale')->name('sale.index');
       Route::post('/admin/dashboard/sale/create', 'createSale')->name('sale.create');
       Route::get('/admin/dashboard/sale/{id}/edit', 'editSale')->name('sale.edit');
       Route::patch('/admin/dashboard/sale/{id}/edit', 'updateSale')->name('sale.update');
       Route::delete('/admin/dashboard/sale/{id}/delete', 'deleteSale')->name('sale.delete');
       Route::get('/admin/dashboard/sale/filter', 'filterSale')->name('sale.filter');
    });
});
