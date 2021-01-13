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
        
        Route::get('giving_user', 'Giving_usersController@index')->name('giving_user.index');
        Route::get('giving_user', 'Giving_usersController@create')->name('giving_user.create');
        Route::post('giving_user', 'Giving_usersController@edit')->name('giving_user.edit');
        Route::post('giving_user', 'Giving_usersController@show')->name('giving_user.show');
        Route::put('giving_user', 'Giving_usersController@update')->name('giving_user.update');
        
        Route::resource('giving_users', 'Giving_usersController');
        
        Route::group(['prefix' => 'giving_users/{id}'],function() {
            Route::get('anniversary', 'AnniversariesController@create')->name('anniversaries.create');
            Route::post('anniversary','AnniversariesController@store')->name('anniversaries.store');
            Route::delete('anniversary','AnniversariesController@destroy')->name('anniversaries.destroy');
            
            Route::post('anniversary', 'AnniversariesController@edit')->name('anniversaries.edit');
            Route::post('anniversary', 'AnniversariesController@show')->name('anniversaries.show');
            Route::put('anniversary', 'AnniversariesController@update')->name('anniversaries.update');
        });
        
        Route::group(['prefix' => 'anniversaries/{id}'],function() {
            Route::get('present', 'PresentsController@create')->name('presents.create');
            Route::post('present','PresentsController@store')->name('presents.store');
            Route::delete('present','PresentsController@destroy')->name('presents.destroy');
            
        });
    });


    Route::get('/','UsersController@index');
