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
    Route::resource('/pubmsg', 'PubmsgController');
    Route::resource('/dm', 'DmController');

    // Invoke Controller（1つのコントローラーに1つの定義しか記述しないという意味）
    Route::get('/', 'HomeController');
    Route::get('/mypage', 'MypageController')->name('mypage');
    Route::get('/history', 'WorksHistoryController')->name('history');
    Route::get('/applicant', 'ApplicantController')->name('applicant');
    Route::get('/change-pass', 'ChangePassController')->name('change-pass');
    Route::get('/settings-menu', 'SettingsMenuController')->name('settings-menu');
});


// 非同期処理
Route::get('/async/works', 'AsyncController@works');
Route::get('/async/favorites', 'AsyncController@getFavorites');
Route::post('/async/favorites', 'AsyncController@postFavorites');
Route::delete('/async/favorites/{user_id}/{work_id}', 'AsyncController@deleteFavorites');
