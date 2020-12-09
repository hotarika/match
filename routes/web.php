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

// **********************************************
// Auth関連のルート
// **********************************************
// vendor/laravel/framework/src/illuminate/Routing/Router.phpに定義されている
Auth::routes();


// **********************************************
// 認証ルート（ログイン必須）
// **********************************************
Route::group(['middleware' => 'auth'], function () {
    Route::resource(
        '/applicants',
        'ApplicantsController',
        ['only' => ['store', 'show', 'update', 'destroy']]
    );
    Route::resource(
        '/applicants-notifications',
        'ApplicantsNotificationsController',
        ['only' => ['index', 'update',]]
    );
    Route::resource(
        '/pubmsgs',
        'ParentPublicMessagesController',
        ['only' => ['index', 'store', 'update']]
    ); //親掲示板
    Route::resource(
        '/child-pubmsgs',
        'ChildPublicMessagesController',
        ['only' => ['store']]
    );
    Route::resource(
        '/dm-boards',
        'DirectMessagesBoardsController',
        ['only' => ['index']]
    );
    Route::resource(
        '/dm-contents',
        'DirectMessagesContentsController',
        ['only' => ['store', 'show']]
    );
    Route::resource(
        '/users',
        'UsersController',
        ['only' => ['show', 'edit', 'update']]
    );
    Route::resource(
        '/works',
        'WorksController',
        ['except' => ['show', 'destroy']]
    );

    // シングルアクションコントローラー（__invoke）
    Route::get('/mypage', 'MyPageController')->name('mypage');
    Route::get('/settings-menu', 'SettingsMenuController')->name('settings-menu');

    // パスワード変更
    Route::get(
        '/password/change',
        'Auth\ChangePasswordController@showChangePasswordForm'
    )->name('password.form');
    Route::post(
        '/password/change',
        'Auth\ChangePasswordController@ChangePassword'
    )->name('password.change');
});


// **********************************************
// パブリックルート（ゲスト閲覧可能）
// **********************************************
Route::get('/', 'HomeController')->name('home');
Route::resource('/works', 'WorksController', ['only' => ['show']]);


// **********************************************
// 非同期処理
// **********************************************
Route::get(
    '/async/works',
    'AsynchronousController@getWorks'
);
Route::get(
    '/async/works-order-mypage',
    'AsynchronousController@getWorksListOfOrderInMyPage'
);
Route::get(
    '/async/works-contract-mypage',
    'AsynchronousController@getWorksListOfApplicationInMyPage'
);
Route::get(
    '/async/badge',
    'AsynchronousController@getNotificationsBadgeNumber'
);
Route::get(
    '/async/pubmsgs-list',
    'AsynchronousController@getPublicMessagesList'
);
Route::get(
    '/async/dm-list',
    'AsynchronousController@getDirectMessagesList'
);
