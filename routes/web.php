<?php

use App\Models\CK\Pbr;
use App\Models\CK\Power;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/power-pdf', [App\Http\Controllers\Pdf\PdfController::class, 'power']);
Route::get('/power-excel', [App\Http\Controllers\Excel\PowerController::class, 'export']);



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app');
Route::get('/weather', [App\Http\Controllers\HomeController::class, 'weather'])->name('weather');
Route::get('/db', [App\Http\Controllers\HomeController::class, 'dbTest'])->name('db');
Route::get('/temperature', [App\Http\Controllers\HomeController::class, 'temperature'])->name('temperature');
Route::get('/power', [App\Http\Controllers\App\PowerController::class, 'index'])->name('power');

//Auth::routes(['register' => false]);

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

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

// Кабинет пользователя

Route::middleware(['auth'])->group(function () {
    Route::prefix('cabinet')->group(function () {
        Route::name('cabinet.')->group(function () {
            Route::get('/', [App\Http\Controllers\App\CabinetController::class, 'index'])
                ->name('cabinet');
        });
    });
});


Route::fallback(function() {
    abort(404);
});
