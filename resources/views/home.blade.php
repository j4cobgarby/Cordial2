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
            posts.date_posted AS date_posted
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
