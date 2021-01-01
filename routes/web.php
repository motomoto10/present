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

// ユーザ登録
    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
    
// 認証
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    
    
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
        Route::get('giving_user', 'Giving_usersController@giving_userForm')->name('giving_user.get');
        Route::post('giving_user','Giving_usersController@giving_userPost')->name('giving_user.post');
        
        Route::get('anniversary', 'AnniversariesController@anniversariesForm')->name('anniversaries.get');
        Route::post('anniversary','AnniversariesController@anniversariesPost')->name('anniversaries.post');
    
        Route::resource('giving_users', 'Giving_usersController', ['only' => ['store', 'destroy']]);
        Route::resource('anniversaries', 'AnniversariesController', ['only' => ['store', 'destroy']]);
    });





    Route::get('/','Giving_usersController@index');
