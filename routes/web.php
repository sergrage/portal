<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function(){
   return view('test');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/weather', [App\Http\Controllers\HomeController::class, 'weather'])->name('weather');

// Параметры
Route::get('/temperature', [App\Http\Controllers\App\TemperatureController::class, 'index'])->name('temperature');
Route::get('/waterTemperature', [App\Http\Controllers\App\TemperatureController::class, 'water'])->name('waterTemperature');
Route::get('/cgms', [App\Http\Controllers\App\TemperatureController::class, 'cgms'])->name('cgms');
Route::get('/power', [App\Http\Controllers\App\PowerController::class, 'index'])->name('power');
Route::get('/reservoir', [App\Http\Controllers\App\ReservoirController::class, 'index'])->name('reservoir');
Route::get('/reservoirCharts', [App\Http\Controllers\App\ReservoirController::class, 'charts'])->name('reservoirCharts');

// Аунтификация

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Экспорт данных
Route::get('/power-pdf', [App\Http\Controllers\Pdf\PdfController::class, 'power'])->name('createPowerPdf');
Route::get('/power-excel/{date?}', [App\Http\Controllers\Excel\PowerController::class, 'export']);
Route::get('/cgms-excel/{date?}', [App\Http\Controllers\Excel\CgmsController::class, 'export']);
Route::get('/reservoir-excel/{date?}/{reservoir?}', [App\Http\Controllers\Excel\ReservoirController::class, 'export']);

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
            Route::get('/parse', [App\Http\Controllers\Admin\ParseController::class, 'index'])
                ->name('parse.index');
             Route::get('/reservoir', [App\Http\Controllers\Admin\ParseController::class, 'reservoir'])
                ->name('parse.reservoirPage');
            Route::post('/parse', [App\Http\Controllers\Admin\ParseController::class, 'store'])
                ->name('parse.store');
            Route::post('/parseReservoir', [App\Http\Controllers\Admin\ParseController::class, 'parseReservoir'])
                ->name('parse.reservoir');
            Route::resources([
			'users' => App\Http\Controllers\Admin\UserController::class,
			'roles' => App\Http\Controllers\Admin\RoleController::class,
            'year' => App\Http\Controllers\Admin\YearController::class,
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
