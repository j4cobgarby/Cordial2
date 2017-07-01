<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    @component('styles')
    @endcomponent
    <link rel="stylesheet" href="{!! asset('css/home.css') !!}">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  </head>
  <body>
    @component('header')
    @endcomponent
    <div class="posts grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 480 }'>
      @php
        $posts = DB::select(
          'SELECT
            users.username AS sender,
            users.name AS name,
            posts.content AS content,
            DATE_FORMAT(posts.date_posted, "%d/%m/%y") AS date_posted
          FROM posts
          INNER JOIN users AS users
            ON posts.author_id = users.id
        ');
        $Parsedown = new Parsedown();
      @endphp
      <div class="grid-item greeting">Hello there, <br>
        <span class="username">
          {{explode(' ', Auth::user()->name)[0]}}!
        </span>
        <br>
        <span class="details">
          <span class="sect">
            <i class="fa fa-comment" aria-hidden="true"></i> 0
          </span>
          <span class="sect">
            <i class="fa fa-exclamation" aria-hidden="true"></i> 0
          </span>
          <span class="sect">
            <i class="fa fa-heart" aria-hidden="true"></i> 0
          </span>
        </span>
      </div>
      @foreach ($posts as $post)
        @component('post')
          @slot('content')
            {!!$Parsedown->text(htmlspecialchars($post->content))!!}
          @endslot
          @slot('username')
            {{$post->sender}}
          @endslot
          @slot('name')
            {{$post->name}}
          @endslot
          @slot('date')
            {{$post->date_posted}}
          @endslot
        @endcomponent
      @endforeach
    </div>
  </body>
</html>
