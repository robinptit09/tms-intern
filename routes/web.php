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

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'Admin\UserController@index')->name('index_admin');
    Route::get('index', function () {
        return redirect()->route('index_admin');
    });

    Route::prefix('course')->group(function () {

        Route::get('list', 'Admin\CourseController@getCourseList')->name('course_list');

        Route::get('edit/{id}', 'Admin\CourseController@getCourseEdit')->name('course_edit');
        Route::post('edit/{id}', 'Admin\CourseController@postCourseEdit')->name('course_edit');

        Route::get('add', 'Admin\CourseController@getCourseAdd')->name('course_add');
        Route::post('add', 'Admin\CourseController@postCourseAdd')->name('course_add');

        Route::get('delete/{id}', 'Admin\CourseController@getCourseDelete')->name('course_delete');
    });

    Route::prefix('exam')->group(function () {
        Route::get('list', 'Admin\ExamController@getExamList')->name('exam_list');

        Route::get('edit/{id}', 'Admin\ExamController@getExamEdit')->name('exam_edit');
        Route::post('edit/{id}', 'Admin\ExamController@postExamEdit')->name('exam_edit');

        Route::get('add', 'Admin\ExamController@getExamAdd')->name('exam_add');
        Route::post('add', 'Admin\ExamController@postExamAdd')->name('exam_add');

        Route::get('delete/{id}', 'Admin\ExamController@getExamDelete')->name('exam_delete');
    });
});