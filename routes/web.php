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

// 初期設定
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');


// Auth関連のルート
// vendor/laravel/framework/src/illuminate/Routing/Router.phpに定義されている
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/applicants', 'ApplicantsController');
    Route::resource('/applicants-notifications', 'ApplicantsNotificationsController');
    Route::resource('/child-pubmsgs', 'ChildPublicMessagesController');
    Route::resource('/dm-boards', 'DirectMessagesBoardsController');
    Route::resource('/dm-contents', 'DirectMessagesContentsController');
    Route::resource('/parent-pubmsgs', 'ParentPublicMessagesController'); //親掲示板
    Route::resource('/users', 'UsersController');
    Route::resource('/works', 'WorksController');

    // Invoke Controller（1つのコントローラーに1つの定義しか記述しないという意味）
    Route::get('/mypage', 'MyPageController')->name('mypage');
    Route::get('/settings-menu', 'SettingsMenuController')->name('settings-menu');
});

// パスワード変更
Route::get('/password/change', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
Route::post('/password/change', 'Auth\ChangePasswordController@ChangePassword')->name('password.change');

// 非同期処理
Route::get('/async/works', 'AsynchronousController@getWorks');
Route::get('/async/badge', 'AsynchronousController@getNotificationsBadgeNumber');
Route::get('/async/pubmsgs-list', 'AsynchronousController@getPublicMessagesList');
