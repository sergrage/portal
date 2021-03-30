<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function(){
   return view('test');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app');

Route::get('/weather', [App\Http\Controllers\HomeController::class, 'weather'])->name('weather');

// Параметры
Route::get('/temperature', [App\Http\Controllers\App\TemperatureController::class, 'index'])->name('temperature');
Route::get('/power', [App\Http\Controllers\App\PowerController::class, 'index'])->name('power');

// Аунтификация

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Экспорт данных
Route::get('/power-pdf', [App\Http\Controllers\Pdf\PdfController::class, 'power'])->name('createPowerPdf');
Route::get('/power-excel/{date?}', [App\Http\Controllers\Excel\PowerController::class, 'export']);

// Страница Админки

Route::middleware(['auth', 'can:admin-panel'])->group(function () {
    Route::prefix('administrator')->group(function () {
        Route::name('administrator.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');
            Route::get('/phpinfo', [App\Http\Controllers\Admin\DashboardController::class, 'phpinfo'])
            ->name('phpinfo');
            Route::get('/dbTest', [App\Http\Controllers\Admin\DashboardController::class, 'dbTest'])
                ->name('dbTest');
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
