<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikePostController extends Controller
{
  /* Since this function has an identifier of __invoke, when calling the
   * controller a method need not be specified, as __invoke will called
   * automatically.
   */
  public function __invoke($id) {
    if (canLikePost($id)) {
      likePost($id);
      echo "liked";
    } else {
      unlikePost($id);
      echo "unliked";
    }
  }
}
