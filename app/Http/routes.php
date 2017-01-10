<?php

Route::auth();


Route::get('/angular', 'Admin\AdminController@angular');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/upgrade', 'Profile\ProfileController@getUpgrade');
Route::get('/create-payment', 'Profile\ProfileController@createPayment');
Route::get('/process-payment', 'Profile\ProfileController@processPayment');
Route::get('/onderwerpen/{subjectId?}', 'Courses\SubjectController@subjectView');

Route::group(['middleware' => 'auth', 'prefix' => 'rest'], function () {
    Route::resource('users', 'Profile\UserController');
    Route::resource('categories', 'Courses\SubjectController');
    Route::resource('courses', 'Courses\CourseController');
    Route::resource('questions', 'Courses\QuestionController');
    Route::resource('news', 'Parent\ParentController');
    Route::resource('child', 'Parent\ChildController');
    Route::resource('content', 'Content\ContentController');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', 'Admin\AdminController@index');
    Route::get('/admin/{categoryId}', 'Admin\AdminController@course');
    Route::get('/admin/course/{courseId}', 'Admin\AdminController@editCourse');
    Route::get('/admin/course/{courseId}/{questionId}', 'Admin\AdminController@editQuestion');
    Route::get('/admin/page/edit/{child}', 'Admin\AdminController@editPage');
    Route::get('/admin/news/{child}', 'Admin\AdminController@editChild');

    //Route::get('/play/{courseId}', 'Courses\CourseController@startCourse');

    Route::group(['middleware' => 'paid'], function () {

        Route::get('/profile', 'Profile\ProfileController@index');

        Route::get('/play/{courseId}/{key}', [
            'as' => 'play-question', 'uses' => 'Courses\CourseController@startFirstQuestion'
        ]);
    });

    Route::post('/check-answer', 'Courses\QuestionController@checkAnswer');
    Route::post('/check-course/{courseId}', 'Courses\CourseController@checkCourse');
    Route::post('/rest/categories/delete', 'Courses\SubjectController@destroy');
    Route::post('/rest/courses/delete', 'Courses\CourseController@destroy');
    Route::post('/rest/questions/delete', 'Courses\QuestionController@destroy');
    Route::post('/rest/child/delete', 'Parent\ChildController@destroy');
});

Route::get('/{subject}/{courseId}/{course}', 'Courses\CourseController@show');


