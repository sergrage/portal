<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app');;


Auth::routes();

// Страница Админки

Route::middleware(['auth', 'can:admin-panel'])->group(function () {
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
