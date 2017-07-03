<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Send</title>
  </head>
  <body>
    @php
      $content =  Input::get('content');
      if (strlen($content) <= 6000) {
        $sql = "INSERT INTO posts (id, author_id, content, tags, date_posted, score)
        VALUES (NULL, ?, ?, ?, ?, 0)";
        DB::insert($sql, [Auth::user()->id, addslashes($content), "", date("Y-m-d H:i:s")]);
      }
    @endphp
  </body>
</html>
