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

Route::get('/write/{id}', function($id) {
  if (userOwnsPost($id)) {
    // It's the user's post - they're not trying to edit someone else's
    return view('write');
  } else {
    return Redirect::to('/');
  }
});

Route::post('/write', function() {
  $content = Input::get('content');
  $tags = (Input::get('tags') != null ? Input::get('tags') : '');
  $sql = "INSERT INTO posts (id, author_id, content, tags, date_posted, score)
  VALUES (NULL, ?, ?, ?, ?, 0)";
  DB::insert($sql, [Auth::user()->id, $content, $tags, date("Y-m-d H:i:s")]);
  return Redirect::to('/');
});

Route::post('/write/{id}', function($id) {
  $content = Input::get('content');
  $tags = (Input::get('tags') != null ? Input::get('tags') : '');
  DB::table('posts')
    ->where('id', $id)
    ->update(['content' => $content, 'tags' => $tags]);
  return Redirect::to('/');
});

Route::get('/search', function() {
  $q =  Input::get('q');
  $parts = explode(':', $q);

  if ($q == '') {
    return Redirect::to('/');
  }

  if (sizeof($parts) > 1) { // in the form 'type:query'
    $type = $parts[0];
    $query = $parts[1];
    if ($parts[0] == 'tag') { // user search for tag
      return view('tag');
    } elseif ($parts[0] == 'user') { // user search for user
    } elseif ($parts[0] == 'post') { // user search for post content
    } else { // unknown search type
    }
  } else { // just searched a query, no type
  }
});

Route::get('/devlogout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('/user/{username}', function($username) {
  if (Auth::check() && userExists($username)) {
    // If they're logged in AND the user exists
    return view('user');
  }
  // If they're not logged in or the user doesn't exist
  return Redirect::to('/');
});

Route::get('/like-post-{id}', 'LikePostController')->middleware('ajax');

// The routes for bookmarks

Route::get('/bookmark-{id}', function($id) {
  if (Auth::check()) {
    if (hasBookmarked($id)) {
      unBookmark($id);
      echo 'unbookmarked';
    } else {
      bookmark($id);
      echo 'bookmarked';
    }
  }
  return Redirect::to('/');
})->middleware('ajax');

Route::get('/bookmarked', function() {
  if (Auth::check()) {
    return view('bookmarks-show');
  }
  return Redirect::to('/');
});

// Only to be called via ajax.
Route::get('/execphp/{func}', function($func) {
  switch ($func) {
    default:
      break;
  }
})->middleware('ajax');

Route::get('/execphp/{func}/{param}', function($func, $param) {
  switch ($func) {
    case 'bookmark': // param = post id
      if (Auth::check()) {
        if (hasBookmarked($param)) {
          unBookmark($param);
          echo 'unbookmarked';
        } else {
          bookmark($param);
          echo 'bookmarked';
        }
      }
      break;

    case 'delete': // param = post id
      if (Auth::check() and userOwnsPost($param)) {
        deletePost($param);
      }
      break;

    default:
      break;
  }
})->middleware('ajax');
