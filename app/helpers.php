<?php

function canLikePost($id) {
  $uid = Auth::user()->id;
  $result = DB::select('SELECT * FROM users_liked_posts WHERE user_id = ? AND post_id = ?', [$uid, $id]);
  return sizeof($result) == 0;
}

function likePost($id) {
  $uid = Auth::user()->id;
  DB::update('UPDATE posts SET score = score + 1 WHERE id = ?', [$id]);
  DB::insert('INSERT INTO users_liked_posts (like_id, user_id, post_id) VALUES (NULL, ?, ?)', [$uid, $id]);
}

function unlikePost($id) {
  $uid = Auth::user()->id;
  DB::update('UPDATE posts SET score = score - 1 WHERE id = ?', [$id]);
  DB::delete('DELETE FROM users_liked_posts WHERE user_id = ? AND post_id = ?', [$uid, $id]);
}

function postScoreReact($id) {
  // React with the score of a post, be it liking or unliking it

  if (canLikePost($id)) {
    likePost($id);
  } else {
    unlikePost($id);
  }
}

function userExists($username) {
  $result = DB::select('SELECT * FROM users WHERE username = ?', [$username]);
  return sizeof($result) >= 1;
}

function userPropsByUsername($username) {
  $props = DB::select('SELECT * FROM users WHERE username = ?', [$username]);
  return $props[0];
}

function firstName($name) {
  return explode(' ', $name)[0];
}

// Not mine:
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function amountBookmarked() {
  return sizeof(DB::select('SELECT * FROM users_bookmarked_posts WHERE user_id = ?', [Auth::user()->id]));
}

function hasBookmarked($id) {
  return sizeof(DB::select('SELECT * FROM users_bookmarked_posts WHERE user_id = ? AND post_id = ?', [Auth::user()->id, $id])) >= 1;
}

function echoBookmarkClass($id) { // to set a html class
  if (hasBookmarked($id)) {
    echo "bookmarked";
  }
}

function bookmark($id) {
  DB::table('users_bookmarked_posts')->insert(
    [
      ['user_id' => Auth::user()->id, 'post_id' => $id]
    ]
  );
}

function unBookmark($id) {
  DB::table('users_bookmarked_posts')->where('post_id', '=', $id)->delete();
}

function userOwnsPost($id) {
  return sizeof(DB::select('SELECT * FROM posts WHERE author_id = ? AND id = ?', [Auth::user()->id, $id])) >= 1;
}
