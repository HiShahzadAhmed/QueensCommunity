<?php

use Illuminate\Support\Facades\Route;





require __DIR__.'/auth.php';




Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/about', 'FrontEndController@about')->name('about');

Route::get('/contact', 'FrontEndController@contact')->name('contact');
Route::post('/submit/contact', 'InquiryController@submitInquiry')->name('submit.inquiry');


Route::get('/search/{txtSearch}', 'SearchController@makeSearch')->name('make.search');
Route::get('/category/{type}/{keyword?}', 'SearchController@searchCategory')->name('search.category');

Route::get('/search', 'SearchController@SearchData')->name('search.form');
Route::post('/load/search', 'SearchController@loadSearchData')->name('loadmore.load_search');
Route::post('/more/search', 'SearchController@loadData')->name('loadmore.search_blogs_videos');

Route::get('/blog/{slug}', 'FrontEndController@blogDetail')->name('blog.detail');




Route::get('/questions', 'FrontEndController@viewQuestion')->name('view.question');
Route::post('/load/question', 'FrontEndController@load_data')->name('loadmore.load_data');

Route::get('/pools', 'FrontEndController@viewPolls')->name('view.polls');
Route::post('/load/pools', 'FrontEndController@loadPools')->name('loadmore.load_pools');

Route::get('/videos', 'FrontEndController@viewVideos')->name('view.videos');
Route::post('/load/videos', 'FrontEndController@loadVideos')->name('loadmore.load_videos');

Route::get('/blogs', 'FrontEndController@viewBlogs')->name('view.blogs');
Route::post('/load/blogs', 'FrontEndController@loadBlogs')->name('loadmore.load_blogs');


Route::get('/hangout', 'FrontEndController@viewHangout')->name('view.hangout');

Route::get('/question/{id}/{slug}', 'FrontEndController@questionDetail')->name('question.detail');
Route::get('/pool/{id}/{slug}', 'FrontEndController@poolDetail')->name('pool.detail');

Route::post('/attempt/login', 'AccountController@attemptLogin')->name('attempt.login');

Route::post('dynamic/fetch', 'FrontEndController@fetchData')->name('category.fetch');

Route::middleware('auth')->group(function() {
    Route::get('doctor/detail', 'User\UserDashboardController@submitDoctorDetail')->name('submit.doctor.detail');
    Route::post('update/doctor/detail', 'User\UserDashboardController@updateDoctorDetail')->name('update.doctor.detail');
});


Route::prefix('user')->name('user.')->middleware(['auth', 'role.check'])->namespace('User')->group(function() {

    Route::get('/dashboard', 'UserDashboardController@index')->name('dashboard');


    Route::get('/profile', 'UserDashboardController@profile')->name('profile');
    Route::post('save-phone', 'UserDashboardController@savePin')->name('save.pin');
    Route::post('save-profile', 'UserDashboardController@saveProfile')->name('save.profile');

    Route::get('/questions', 'QuestionController@index')->name('index.questions');
    Route::get('/post/question', 'QuestionController@postQuestion')->name('post.question');
    Route::post('/store/question', 'QuestionController@storeQuestion')->name('store.question');
    Route::get('/edit/question/{id?}', 'QuestionController@editQuestion')->name('edit.question');
    Route::post('/update/question', 'QuestionController@updateQuestion')->name('update.question');
    Route::get('/remove/question/{id?}', 'QuestionController@removeQuestion')->name('remove.question');

    Route::post('/post/question/answer', 'QuestionController@postQuestionAnswer')->name('post.question.answer');





    Route::get('/pools', 'PoolController@index')->name('index.pool');

    Route::get('/create/pool', 'PoolController@createPool')->name('create.pool');
    Route::post('/store/pool', 'PoolController@storePool')->name('store.pool');
    Route::get('/remove/pool/{id?}', 'PoolController@removePool')->name('remove.pool');
    Route::post('pool/suggestion', 'PoolController@submitPoolSuggestion')->name('submit.pool.suggestion');



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
        'roles'         => 'RoleController',
        'teams'         => 'TeamController',
        'blogs'         => 'BlogController',
        'questions'     => 'QuestionController',
        'videos'        => 'VideoController',
        'categories'    => 'CategoryController',
    ]);
    Route::get('teams/remove/{id?}', 'TeamController@remove')->name('teams.remove');


    Route::get('settings/', 'SettingController@index')->name('setting.index');
    Route::post('settings/update', 'SettingController@update')->name('setting.update');



    Route::get('inquiries', 'InquiryController@inquiries')->name('inquiries');
    Route::get('inquiry/update/{id}', 'InquiryController@inquiryUpdate')->name('inquiry.update');


});
