<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    @component('styles')
    @endcomponent
    <link rel="stylesheet" href="{!! asset('css/home.css') !!}">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  </head>
  <body>
    @component('header')
    @endcomponent
    @component('obscurer')
    @endcomponent
    <div class="posts grid">
      @php
        $posts = DB::select(
          'SELECT
            users.username AS sender,
            users.name AS name,
            posts.content AS content,
            posts.id AS post_id,
            DATE_FORMAT(posts.date_posted, "%d/%m/%y") AS date_posted
          FROM posts
          INNER JOIN users AS users
            ON posts.author_id = users.id
        ');
        $Parsedown = new Parsedown();
      @endphp
      <div class="grid-item greeting">
        Hello there,
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
      <div class="grid-item newpost" onclick='window.location.href="/write"'>
        Want to write something? <b>Click here!</b>
      </div>
      <div class="grid-item discover" onclick='window.location.href="/discover"'>
        <b>Click here</b> to discover new people and interesting posts!
      </div>
      @foreach ($posts as $post)
        @component('post')
          @slot('content')
            {!!$Parsedown->text($post->content)!!}
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
          @slot('id')
            {{$post->post_id}}
          @endslot
        @endcomponent
      @endforeach
    </div>
  </body>
  <script>
    var msnry;
    msnry = new Masonry( '.grid', {
      itemSelector: '.grid-item',
      columnWidth: 450 + 15*2
    });
    function reload() {
      setTimeout(function() {
        msnry.layout();
      }, 0);

      console.log("reloaded");
    }

    function resetSelected() {
      $('.expanded').each(function(index) {
        this.classList.remove('expanded');
      });
      reload();
    }

    $(document).keyup(function(e) {
      if (e.keyCode == 27) { // Escape
        resetSelected();
      }
    });
  </script>
</html>
