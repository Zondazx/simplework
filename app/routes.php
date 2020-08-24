<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('welcome');
});

Route::get("about", function() {
	return View::make("about", array("articles" => Article::take(3)->latest()->get()));
});

Route::get("articles", "ArticlesController@index");
Route::get("articles/create", "ArticlesController@create");
Route::post("articles", "ArticlesController@store");
Route::get("articles/{article}", array("as" => "articles.show", "uses" => "ArticlesController@show"));
Route::get("articles/{article}/edit", array("as" => "articles.edit", "uses" => "ArticlesController@edit"));
Route::put("articles/{article}", "ArticlesController@update");