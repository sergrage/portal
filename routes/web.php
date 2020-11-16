<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app');;


//Auth::routes(['register' => false]);

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Страница Админки

Route::middleware(['auth', 'can:admin-panel'])->group(function () {
    Route::prefix('administrator')->group(function () {
        Route::name('administrator.')->group(function () {
            Route::post( 'users/updatePassword/{user}', [App\Http\Controllers\Admin\UserPasswordController::class, 'update'])->name('users.updatePassword');
            Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');
            Route::resources([
			'users' => App\Http\Controllers\Admin\UserController::class,
			'roles' => App\Http\Controllers\Admin\RoleController::class,
		]);

        });
    });

});


Route::fallback(function() {
    abort(404);
});
