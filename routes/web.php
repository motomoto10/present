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
    
    # ゲストユーザーログイン
    Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');
    
// 認証
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    
    
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('users', 'UsersController');
        
        Route::get('presentlist','UsersController@presentlist')->name('users.presentlist');

        
        Route::group(['prefix' => 'users/{id}'],function() {            
            Route::get('giving_users','UsersController@giving_users')->name('users.giving_users');
            Route::get('anniversaries','UsersController@anniversaries')->name('users.anniversaries');
            Route::get('presents','UsersController@presents')->name('users.presents');
        });
        
        Route::resource('giving_users', 'Giving_usersController');
        
        // プロフィール画像登録
        Route::get('/profile', 'ProfileController@index')->name('profile.index');
        Route::post('/profile', 'ProfileController@store')->name('profile.store');
        
        
        Route::group(['prefix' => 'giving_users/{id}'],function() {
            Route::group(['prefix' => 'anniversaries/{anniversary}'],function() {
            Route::resource('presents', 'PresentsController');
            });            
            
            Route::resource('anniversaries', 'AnniversariesController');
            
            Route::get('favorite_present','PresentsController@favorite_present')->name('presnts.favorite_present');

            
        });
        
        Route::group(['prefix' => 'presents/{id}'],function(){
            
            Route::post('favorite','FavoritePresentController@store')->name('presents.favorite');
            Route::delete('unfavorite','FavoritePresentController@destroy')->name('preesnts.unfavorite');
            
            Route::resource('comment','Comment_presentsController',['only' => ['create','store', 'destroy']]);
        });
    
        
        
    });


    Route::get('/','Giving_usersController@index');
