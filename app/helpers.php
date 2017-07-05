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
