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

        Route::get('detail/{id}', 'Admin\ExamController@getExamDetail')->name('exam_detail');

        Route::get('{id}/addQuestion', 'Admin\ExamController@getAddQuestion')->name('exam_addQuestion');

        Route::post('{id}/addQuestion', 'Admin\ExamController@postAddQuestion')->name('exam_addQuestion');

        Route::get('question/{idquestion}/addAnswer', 'Admin\ExamController@getAddAnswer')->name('exam_addAnswer');

        Route::post('question/{idquestion}/addAnswer', 'Admin\ExamController@postAddAnswer')->name('exam_addAnswer');

        Route::get('question/{idquestion}/delete', 'Admin\ExamController@getQuestionDelete')->name('exam_deleteQuestion');

        Route::get('question/{idquestion}/edit', 'Admin\ExamController@getQuestionEdit')->name('exam_editQuestion');

        Route::post('question/{idquestion}/edit', 'Admin\ExamController@postQuestionEdit')->name('exam_editQuestion');

        Route::get('question/{idquestion}/editAnswer', 'Admin\ExamController@getEditAnswer')->name('exam_editAnswer');

        Route::post('question/{idquestion}/editAnswer', 'Admin\ExamController@postEditAnswer')->name('exam_editAnswer');
    });

    Route::any('{query}',
        function() { return redirect('/'); })
        ->where('query', '.*')->name('admin');
});

Route::get('/getCreate','Frontend\UserController@getCreate')->name('getCreate');

Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('','HomeController@getIndex');

Route::resource('register','RegisterController');
