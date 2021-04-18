<?php

use Illuminate\Support\Facades\Route;





require __DIR__.'/auth.php';




Route::get('/', 'FrontEndController@index')->name('index');

Route::get('/question/{slug}', 'FrontEndController@questionDetail')->name('question.detail');

Route::post('/attempt/login', 'AccountController@attemptLogin')->name('attempt.login');

Route::post('dynamic/fetch', 'FrontEndController@fetchData')->name('category.fetch');

Route::prefix('user')->name('user.')->middleware('auth')->namespace('User')->group(function() {

    Route::get('/dashboard', 'UserDashboardController@index')->name('dashboard');







    Route::get('/questions', 'QuestionController@index')->name('index.questions');
    Route::get('/post/question', 'QuestionController@postQuestion')->name('post.question');
    Route::post('/store/question', 'QuestionController@storeQuestion')->name('store.question');
    Route::get('/edit/question/{id?}', 'QuestionController@editQuestion')->name('edit.question');
    Route::post('/update/question', 'QuestionController@updateQuestion')->name('update.question');

    Route::get('/remove/question/{id?}', 'QuestionController@removeQuestion')->name('remove.question');




    Route::get('/create/pool', 'PoolController@createPool')->name('create.pool');

});
























/*======================================================================
                            ADMIN ROUTES
======================================================================*/

Route::get('admin/login', 'Admin\AdminLoginController@adminIndexLogin')->name('admin.index.login');
Route::post('admin/login', 'Admin\AdminLoginController@AdminAttemptLogin')->name('admin.attempt.login');

Route::prefix('admin')->name('admin.')->middleware('admin')->namespace('Admin')->group(function() {

    Route::get('/dashboard', 'AdminLoginController@dashboard')->name('dashboard');
    Route::get('profile', 'AdminProfileController@profile')->name('profile');
    Route::post('update-profile', 'AdminProfileController@updateProfile')->name('update.profile');


    Route::resources([
        'roles'     => 'RoleController',
        'teams'     => 'TeamController',
        'blogs'     => 'BlogController',
        'questions' => 'QuestionController',
        'videos'    => 'VideoController',
    ]);
    Route::get('teams/remove/{id?}', 'TeamController@remove')->name('teams.remove');


    Route::get('settings/', 'SettingController@index')->name('setting.index');
    Route::post('settings/update', 'SettingController@update')->name('setting.update');


});
