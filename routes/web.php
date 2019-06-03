<?php
use Illuminate\Support\Facades\Artisan;

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
	
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});


Route::group(['middleware' => 'auth.logout'], function () {
    Route::get('/', ['as' => 'auth.user', 'uses' => 'Auth\LoginController@index']);
    Route::get('login', ['as' => 'auth.user', 'uses' => 'Auth\LoginController@index']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@login']);

    Route::post('senha/email', ['as' => 'auth.email', 'uses' => 'Auth\UserForgotPasswordController@sendResetLinkEmail']);
    Route::get('senha/esqueci-senha', ['as' => 'auth.forget', 'uses' => 'Auth\UserForgotPasswordController@showLinkRequestForm']);
    Route::post('senha/esqueci-senha', ['uses' => 'Auth\UserResetPasswordController@reset']);
    Route::get('senha/esqueci-senha/{token}', ['as' => 'auth.reset', 'uses' => 'Auth\UserResetPasswordController@showResetForm']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::resource('users', 'UsersController', ['except' => ['show', 'update' ,'destroy']]);
        Route::post('users/show', ['as' => 'users.show', 'uses' => 'UsersController@show']);
        Route::put('users/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);
        Route::delete('users/destroy', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);

    Route::resource('polos', 'PolosController', ['except' => ['show', 'update', 'destroy']]);
        Route::post('polos/show', ['as' => 'polos.show', 'uses' => 'PolosController@show']);
        Route::put('polos/update', ['as' => 'polos.update', 'uses' => 'PolosController@update']);
        Route::delete('polos/destroy', ['as' => 'polos.destroy', 'uses' => 'PolosController@destroy']);

    Route::resource('temas', 'TemasController', ['except' => ['show', 'update', 'destroy']]);
        Route::post('temas/show', ['as' => 'temas.show', 'uses' => 'TemasController@show']);
        Route::put('temas/update', ['as' => 'temas.update', 'uses' => 'TemasController@update']);
        Route::delete('temas/destroy', ['as' => 'temas.destroy', 'uses' => 'TemasController@destroy']);
});