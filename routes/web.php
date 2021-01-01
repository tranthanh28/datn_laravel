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

Auth::routes();
Route::get('/NapTien', function () {
    return view('frontend.NapTien');
})->name('NapTien');
Route::get('/PhongHop', function () {
    return view('frontend.PhongHop');
})->name('PhongHop');

Route::get('/search', 'SearchController@index')->name('search.index');
Route::get('/search-results', 'SearchController@search')->name('search.result');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/{course}', 'CourseController@index')->name('course');
Route::get('/course/{topic}', 'TopicController@index')->name('topic');
Route::get('/lesson/{lesson}', 'LessonController@index')->name('lesson');
Route::get('/account/ThongTinTk', 'AccountController@index')->name('TTTK');
Route::get('/account/DoiMK', 'AccountController@DoiMK')->name('DoiMK');
Route::post('/account/updateMK', 'AccountController@updateMK')->name('updateMK');
Route::get('/account/KhoaHocDK', 'AccountController@KhoaHocDK')->name('KhoaHocDK');
Route::get('/account/SuaTT', 'AccountController@showSuaTT')->name('SuaTT');
Route::post('/account/Suathongtin', 'AccountController@SuaTT')->name('Suathongtin');
Route::get('/DangKy/{topic}', 'AccountController@DangKy')->name('DangKyKH');
Route::post('/Comment/addComment', 'CommentController@store')->name('comments.store');

// tim kiem
