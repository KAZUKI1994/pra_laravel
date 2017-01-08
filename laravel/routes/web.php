<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return 'OK';
    // return view('welcome');
});

Route::resource('articles', 'ArticlesController');

Route::get('contact', 'PagesController@contact');
Route::get('about', 'PagesController@about');


// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', 'ArticlesController@create');
// Route::post('articles', 'ArticlesController@store');
// Route::get('articles/{id}/edit', 'ArticlesController@edit');
// Route::get('articles/{id}', 'ArticlesController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('foo', ['middleware' => 'manager', function(){
  return 'this page may only be viewed by managers';
}]);
Route::get('tags/{tags}', 'TagsController@show');
