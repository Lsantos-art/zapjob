<?php

use App\Mail\MasterNotifications;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

//Auth
Route::get('logout', 'HomeController@logout')->name('logout');
Auth::routes();


//Master routes
Route::group(['middleware' => ['auth' => 'master'], 'namespace' => 'master', 'prefix' => 'master'], function () {

    Route::get('/', 'GeneralController@index')->name('master.index');

    //Profile
    Route::get('/profile', 'GeneralController@edit')->name('master.edit');

    //Config
    Route::get('/config', 'ConfigController@index')->name('master.config');
    Route::post('/star', 'ConfigController@star')->name('master.config.star');


    //Categories
    Route::get('/categories', 'CategoriesController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('/categories/create', 'CategoriesController@store')->name('categories.store');
    Route::get('/categorie/{id}', 'CategoriesController@edit')->name('categories.edit');
    Route::post('/categorie/update', 'CategoriesController@update')->name('categories.update');
    Route::get('/categorie/delete/{id}', 'CategoriesController@destroy')->name('categories.destroy');


    //Users
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/show/{id}', 'UsersController@show')->name('users.show');
    Route::post('/users/search', 'UsersController@search')->name('users.search');
    Route::get('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');


    //User Posts
    Route::get('posts/', 'GeneralController@posts')->name('master.posts');
    Route::get('/posts/user/{id}', 'GeneralController@posts')->name('master.userposts');
    Route::get('/authorization/{id}', 'PostsController@store')->name('posts.authorize');
    Route::get('/posts/delete/{id}', 'PostsController@destroy')->name('posts.destroy');

    //Master Posts
    Route::get('posts/', 'GeneralController@postsMasterIndex')->name('master.posts.index');
    Route::get('/posts/create', 'GeneralController@postsMasterForm')->name('master.posts.create');
    Route::post('/posts/store', 'GeneralController@postMasterCreate')->name('master.postsStore');
    Route::get('/posts/edit/{id}', 'GeneralController@postMasterEdit')->name('master.postsEdit');
    Route::post('/posts/update', 'GeneralController@postMasterUpdate')->name('master.postsUpdate');
    Route::get('masterPost/delete/{id}', 'GeneralController@postDestroy')->name('master.posts.destroy');

});

//Authorizations routes
Route::group(['middleware' => ['auth' => 'master'], 'namespace' => 'admin', 'prefix' => 'master'], function () {

    Route::get('/authorization', 'AuthorizationController@index')->name('authorization.index');
    Route::get('/authorization/delete/{id}', 'AuthorizationController@destroy')->name('authorization.destroy');
});


//Admin routes
Route::group(['middleware' => 'auth', 'namespace' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'AdminController@index')->name('admin.index');

    //Profile
    Route::get('/profile', 'AdminController@edit')->name('admin.edit');
    Route::post('/profile', 'AdminController@update')->name('admin.update');
    Route::get('/profile/delete/{id}', 'AdminController@destroy')->name('admin.destroy');


    //Posts
    Route::get('/posts', 'AdminController@posts')->name('posts.index');
    Route::get('/posts/create', 'AuthorizationController@create')->name('posts.create');
    Route::get('/posts/{id}', 'AuthorizationController@edit')->name('posts.edit');
    Route::post('/posts/update', 'AuthorizationController@update')->name('posts.update');
    Route::post('/posts/create', 'AuthorizationController@store')->name('posts.store');
    Route::get('/posts/destroy/{id}', 'AdminController@postsDestroy')->name('postsDestroy.store');

});

//Site routes
Route::group(['namespace' => 'site'], function () {

    Route::get('/', 'SiteController@index')->name('home');
    Route::get('resultados/{slug}/{id}', 'SiteController@byCateg')->name('byCateg');
    Route::post('search', 'SiteController@search')->name('search');
    Route::get('{slug}/{id}', 'SiteController@show')->name('show');


    //about routes
    Route::get('/sobre', 'SiteController@sobre')->name('sobre.index');
    Route::get('/terms', 'SiteController@terms')->name('sobre.terms');

});

Route::group(['namespace' => 'site', 'prefix' => 'contact'], function () {

    //zap
    Route::post('/', 'SiteController@zap')->name('zap');
    Route::post('post/share', 'SiteController@share')->name('share');
});


