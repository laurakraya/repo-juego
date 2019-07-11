<?php
//use Illuminate\Routing\Route;
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

Route::view('/', 'front.index')->name('index');

Route::get('/profile', function() {
    return view('front.profile');
});

Route::post("/profile", "UserController@store");

Route::get('/challenge/{lvlId?}/', 'ChallengeController@create');

Route::post('/challenge/{lvlId?}/', 'ChallengeController@update')->name('challenge.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/newImage', 'LevelController@index');

Route::post("/newImage", "ImageController@store");

Route::get('/ranking', 'RankingController@index');

/* Route::get('/instalar', function(){
    Artisan::call("storage:link");
}); */