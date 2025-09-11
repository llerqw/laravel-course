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

Route::get('/my_page', function () {
    return 'this is my page';
});


//8 роутов

Route::get('/my_name', function (){
    return 'my name is Lera';
});

Route::get('/my_age', function (){
    return 'im 18';
});

Route::get('/my_city', function (){
    return 'my is city';
});

Route::get('/my_hobby', function (){
    return 'my hobby is reading';
});

Route::get('/my_pet', function (){
    return 'my pet is cat';
});

Route::get('/my_fav_food', function (){
    return 'my favorite food is pizza';
});

Route::get('/my_fav_music', function (){
    return 'my favorite music is sza';
});

Route::get('/my_fav_book', function (){
    return 'my favorite book is Haruki Murakami Norwegian Forest';
});
