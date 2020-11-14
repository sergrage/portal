<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/app', [App\Http\Controllers\HomeController::class, 'index'])->name('app');

// Страница Админки

Route::middleware(['auth'])->group(function () {
	Route::prefix('administrator')->group(function () {
		Route::name('administrator.')->group(function () {

		Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

		Route::resources([
			'users' => App\Http\Controllers\Admin\UserController::class,
			'roles' => App\Http\Controllers\Admin\RoleController::class,
		]);
	});
	});
});
