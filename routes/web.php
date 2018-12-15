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
// 
Route::get('/', function () {
    return redirect('/login', 301);    // welcome is view from resources >> views >> welcome.blade.php
    //return "Laravel World!";
});

// Route::any('/home', function () {
//         return view('home');
//         # code...
// });



// Cotoller based route
Route::get('/home', 'userController@home');
Route::match(['get', 'post'],'/login', 'userController@login');
Route::match(['get', 'post'],'/register', 'userController@register');
Route::match(['get', 'post'], '/einfo/{id}', 'userController@editInfo');
