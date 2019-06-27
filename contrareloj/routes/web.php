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

Route::get('/', function () {
    return view('front.index');
});

/* Route::get('/challenge', function() {
    return view('front.challenge');
}); */

Route::get('/profile', function() {
    return view('front.profile');
});
<<<<<<< HEAD

Route::get('/challenge', 'ChallengeController@challenge');
=======
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 3a6fa9654615c06e0576fda3298f29dc1b3b8857
