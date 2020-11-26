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

// Route::get('/', function () {
//     return view('welcome');
// });

// 設定
// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/mypage', function () {
//     return view('mypage');
// });
// Route::get('/applicant', function () {
//     return view('applicant');
// });
// Route::get('/change-pass', function () {
//     return view('change-pass');
// });
// Route::get('/dm-list', function () {
//     return view('dm-list');
// });
// Route::get('/dm', function () {
//     return view('dm');
// });
// Route::get('/profile-edit', function () {
//     return view('profile-edit');
// });
// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/pubmsg-list', function () {
//     return view('pubmsg-list');
// });
// Route::get('/work-detail', function () {
//     return view('work-detail');
// });
// Route::get('/work-form', function () {
//     return view('work-form');
// });
// Route::get('/work-history', function () {
//     return view('work-history');
// });
// Route::get('/work-list', function () {
//     return view('work-list');
// });
// Route::get('/login-temp', function () {
//     return view('auth/login-temp');
// });
// Route::get('/register-temp', function () {
//     return view('auth/register-temp');
// });

// Auth関連のルート
// vendor/laravel/framework/src/illuminate/Routing/Router.phpに定義されている
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Resource（今後CRUD処理を拡張する可能性を踏まえて、resourceで定義）
Route::resource('/users', 'UsersController');
Route::resource('/works', 'WorksController');
Route::resource('/pubmsg', 'PubmsgController');
Route::resource('/dm', 'DmController');

// Invoke Controller（1つのコントローラーに1つの定義しか記述しないという意味）
Route::get('/', 'HomeController');
Route::get('/mypage', 'MypageController');
Route::get('/history', 'WorksHistoryController');
Route::get('/applicant', 'ApplicantController');
Route::get('/change-pass', 'ChangePassController');
