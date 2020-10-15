<?php

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

Route::post('form_submit', 'FormSubmitController@index')->name('form_submit');

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'portfolio'], function () {
    Route::get('/', 'PortfolioController@index')->name('portfolio');
    Route::get('/{id}', 'PortfolioController@index')->name('portfolio');
});

Route::group(['prefix' => 'services'], function () {
    Route::get('/', 'ServicesController@index')->name('services');
    Route::get('/{post}', 'ServicesController@post')->name('services_post');
});

Route::group(['prefix' => 'about'], function () {
    Route::get('/', 'AboutController@index')->name('about');
    Route::get('/{category}/', 'AboutController@show')->name('about_category');
    Route::get('/{category}/{post}', 'AboutController@product')->name('about_product');
});

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', 'CatalogController@index')->name('catalog');
    Route::get('/{category}/', 'CatalogController@show')->name('catalog_category');
    Route::get('/{category}/{post}', 'CatalogController@product')->name('catalog_product');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'NewsController@index')->name('blog');
    //Route::get('/{category}/', 'NewsController@show')->name('blog_category');
    Route::get('/{post}', 'NewsController@post')->name('blog_post');
});

Auth::routes([
    'confirm' => false,
    'forgot' => false,
    'login' => true,
    'register' => false,
    'reset' => false,
    'verification' => false,
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'Auth\DashboardController@index')->name('dashboard');
    Route::resource('category', 'Auth\CategoryController');
    Route::resource('post', 'Auth\PostController');
    Route::resource('menu', 'Auth\MenuController');
    Route::resource('album', 'Auth\AlbumsController');

//    Route::get('/album', array('as' => 'album_index', 'uses' => 'Auth\AlbumsController@getList'));
//    Route::get('/album_form', array('as' => 'album_form', 'uses' => 'Auth\AlbumsController@getForm'));
//    Route::post('/album_create', array('as' => 'album_create', 'uses' => 'Auth\AlbumsController@postCreate'));
//    Route::get('/album_delete/{id}', array('as' => 'album_delete', 'uses' => 'Auth\AlbumsController@getDelete'));
//    Route::get('/album/{id}', array('as' => 'show_album', 'uses' => 'Auth\AlbumsController@getAlbum'));

    Route::get('/album_image_form/{id}', array('as' => 'album_image_form', 'uses' => 'Auth\AlbumsController@addImageForm'));
    Route::post('/add_image_to_album/{id}', array('as' => 'add_image_to_album', 'uses' => 'Auth\AlbumsController@addImageToAlbum'));
    Route::get('/delete_image_to_album/{id}', array('as' => 'delete_image_to_album', 'uses' => 'Auth\AlbumsController@deleteImageToAlbum'));

});

