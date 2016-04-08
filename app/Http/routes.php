<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function() {

// Login routes...
Route::get('auth/login', 						['as' => 'login',			'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 						['as' => 'login-post',		'uses' => 'Auth\AuthController@postLogin']);

Route::get('auth/logout', 						['as' => 'logout',			'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register',	 					['as' => 'register',		'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',					['as' => 'register-done', 	'uses' => 'Auth\AuthController@postRegister']);

// Index
Route::get( '/', 								['as' => 'index', 			'uses' => 'HomeController@getIndex']);

// Posts
Route::get('posts/newpost', 					['as' => 'post-page',		'uses' => 'PostController@getNewPost']);
Route::post('posts/newpost',					['as' => 'post-create',		'uses' => 'PostController@postNewPost']);

// Favorites
Route::get('posts/favorites',					['as' => 'favorites-show',	'uses' => 'PostController@getFavorites']);
Route::get('posts/favorites/add/{postid}',		['as' => 'favorites-add',	'uses' => 'PostController@addFavorite']);
Route::get('posts/favorites/remove/{postid}',	['as' => 'favorites-remove','uses' => 'PostController@removeFavorite']);

// Account
Route::get('account/{username}',				['as' => 'account-page',	'uses' => 'AccountController@getAccount']);

});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/**
 * ALL ROUTES THAT USES SESSIONS MUST PASS THROUGH THIS MIDDLEWARE GROUP.
 */
Route::group(['middleware' =>[ 'web']], function () {

	
});
