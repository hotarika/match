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
    // Resource（今後CRUD処理を拡張する可能性を踏まえて、resourceで定義）
    Route::resource('/users', 'UsersController');
    Route::resource('/works', 'WorksController');
    Route::resource('/pubmsg', 'ParentPublicMessagesController'); //親掲示板
    Route::resource('/child', 'ChildPublicMessagesController');
    Route::resource('/dm', 'DirectMessagesContentsController');
    Route::resource('/dm-board', 'DirectMessagesBoardsController');
    Route::resource('/applicant', 'ApplicantsController');
    Route::resource('/notification', 'ApplicantsNotificationsController');

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
