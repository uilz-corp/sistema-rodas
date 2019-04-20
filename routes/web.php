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


Route::get('/', ['as' => 'auth.user', 'uses' => 'Auth\LoginController@index']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@login']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::resource('users', 'UsersController');
});