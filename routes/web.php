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
    if (Auth::check()) {
      return view('/home');
    }
    return view('welcome');
});

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/settings', function() {
  return view('settings');
});

Route::get('/write', function() {
  return view('write');
});

Route::post('/write', function() {
  $content =  Input::get('content');
  $sql = "INSERT INTO posts (id, author_id, content, tags, date_posted, score)
  VALUES (NULL, ?, ?, ?, ?, 0)";
  DB::insert($sql, [Auth::user()->id, addslashes($content), "", date("Y-m-d H:i:s")]);
  return Redirect::to('/');
});

Route::get('/devlogout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('/user/{username}', function() {

});

Route::get('/like-post-{id}', 'LikePostController');
