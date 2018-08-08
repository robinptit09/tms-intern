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

    Route::group(['prefix'=>'user'], function () {
        Route::get('list', ['as' => 'user_listuser' , 'uses' => 'Admin\UserController@getlistuser']);

        Route::get('create', ['as' => 'user_create' , 'uses' => 'Admin\UserController@getadduser']);

        Route::post('store', ['as' => 'user_store' , 'uses' => 'Admin\UserController@store']);
        Route::get('delete/{id}', ['as' => '' , 'uses' => 'Admin\UserController@getUserDelete'])->name('user_delete');
    });

    Route::resource('document', 'Admin\DocumentController');
});


Route::get('/', 'Frontend\UserController@index')->name('index');

Route::get('login', 'Frontend\UserController@getLogin')->name('login');

Route::post('login', 'Frontend\UserController@postLogin')->name('login');

Route::get('register', 'Frontend\UserController@getRegister')->name('register');

Route::post('register', 'Frontend\UserController@postRegister')->name('register');

Route::get('logout', 'Frontend\UserController@getLogout')->name('logout');

Route::group(['middleware' => 'user'], function() {

    Route::get('listCourse/{id}', 'Frontend\UserController@getListExams')->name('listCourse');

    Route::get('exam/{id}', 'Frontend\UserController@getExam')->name('exam');

    Route::post('exam/{id}', 'Frontend\UserController@postExam')->name('exam');

    Route::get('user', 'Frontend\UserController@getInfoUser')->name('user');

    Route::get('editInfoUser', 'Frontend\UserController@getEditInfoUser')->name('editInfoUser');

    Route::post('editInfoUser', 'Frontend\UserController@postEditInfoUser')->name('editInfoUser');
});

