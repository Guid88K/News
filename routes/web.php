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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/busy_filter','NewsController@busy_filter');
Route::get('/marketing_filter','NewsController@marketing_filter');
Route::get('/management_filter','NewsController@management_filter');
Route::get('/finances_filter','NewsController@finances_filter');
Route::get('/other_filter','NewsController@other_filter');
Route::get('/search','NewsController@search');

Route::resource('/unews','UserRole',['only'=>['index','show']]);

Route::get('setlocale/{locale}', function ($locale) {

    if (in_array($locale, \Config::get('app.locales'))) {   # Проверяем, что у пользователя выбран доступный язык
        Session::put('locale', $locale);                    # И устанавливаем его в сессии под именем locale
    }

    return redirect()->back();                              # Редиректим его <s>взад</s> на ту же страницу

});

//Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {
//    Route::resource('/news','NewsController');
//});
Route::resource('/news','NewsController');
