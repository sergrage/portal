<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('admin.admin');
// });


Auth::routes();

// Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Страница Админки

Route::middleware(['auth'])->group(function () {
	Route::prefix('admin')->group(function () {
		Route::name('admin.')->group(function () {

		Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
		Route::resources([
			'users' => App\Http\Controllers\Admin\UserController::class,
			'roles' => App\Http\Controllers\Admin\RoleController::class,
		]);
	});
	});
});


// Route::group(
// 	[
//         'prefix' => 'admin',
//         'as' => 'admin.',
//         'namespace' => 'Admin',
//         'middleware' => ['auth'],
//     ],
//     function () {
        // Route::get('/', 'HomeController@index')->name('admin');
		// Route::resource('/users', 'UserController');
		// Route::resource('/posts', 'PostController');
		// Route::resource('/comments', 'CommentsController');
		// Route::post('/comments/{comment}/unBan', 'CommentsController@unBan')->name('comments.unBan');
		// Route::post('/comments/{comment}/ban', 'CommentsController@ban')->name('comments.ban');
		// Route::post('/comments/answer', 'CommentsController@answer')->name('comments.answer');
		// Route::resource('/tags', 'TagController');
		// Route::resource('/about', 'AboutController');
		// Route::post('/users/avatarUpload', 'AvatarUploadController@avatarUpload');
		// Route::post('/posts/postImageUpload', 'AvatarUploadController@postImageUpload');
		// Route::get('/contacts', 'ContactController@index')->name('contacts');
		// Route::get('/contacts/preview', 'ContactController@preview')->name('preview');
		// Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');
		// Route::get('/adress', 'AdressController@index')->name('adress');
		// Route::post('/adress/store', 'AdressController@store')->name('adress.store');
// });