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

Route::get('/', function () {
    return 'aaaaaaaaaaaaaaaa';
});

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');


//8 роутов

Route::get('/my_name', 'MyNameController@index');

Route::get('/my_age', 'MyAgeController@index');

Route::get('/my_city', 'MyCityController@index');

Route::get('/my_hobby', 'MyHobbyController@index');

Route::get('/my_pet', 'MyPetController@index');

Route::get('/my_fav_food', 'MyFavFoodController@index');

Route::get('/my_fav_music', 'MyFavMusicController@index');

Route::get('/my_fav_book', 'MyFavBookController@index');

Route::get('/my_fav_color', 'MyFavColorController@index');

Route::get('/my_language ', 'MyLanguageController@index');
