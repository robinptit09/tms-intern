<?php

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

Route::group(
    [
        'middleware' => ['web'],
    ],
    function () {
        // sample new repository type
        Route::get('/posts',
            ['as' => POST_LIST , 'uses' => 'PostController@show']);
        // end sample
    }
);

Route::get('admin/login', 'Admin\UserController@getLogin')->name('admin_login');
Route::post('admin/login', 'Admin\UserController@postLogin')->name('admin_login');

Route::get('admin/logout', 'Admin\UserController@getLogout')->name('admin_logout');

//Route::get('admin/create', 'Admin\UserController@getCreate');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\ExamController@index')->name('index_admin');
    Route::get('index', function () {
        return redirect()->route('index_admin');
    });
});