<!DOCTYPE html>
@php
  $searchfor = explode(':', Request::get('q'))[1];
@endphp
<html>
  <head>
    <meta charset="utf-8">
    <title>Cordial - Search tag '{{$searchfor}}'</title>
    @component('styles')
    @endcomponent
    <link rel="stylesheet" href="{!! asset('css/home.css') !!}">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="{!! asset('js/infinite-scroll.pkgd.min.js') !!}" charset="utf-8"></script>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/languages/go.min.js"></script>
    <script>
    $(document).ready(function() {
      $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
      });
      reload();
    });

    $(document).ready(function() {
      $("[id^=likebtn]").each(
        function() {
          var thisId = this.id.split("-")[1];
          this.setAttribute("onclick", `$.ajax({url: "/like-post-"+`+thisId+`,
          success: function(result) {
            var p = document.getElementById("likebtn-`+thisId+`");
            p.classList.toggle("liked");
            if (result == "liked") {
              console.log("Liked");
              var icon = document.getElementById('likeicon-`+thisId+`');
              var count = document.getElementById('likecount-`+thisId+`');
              count.innerHTML = parseInt(count.innerHTML) + 1;
            } else {
              console.log("Unliked");
              var icon = document.getElementById('likeicon-`+thisId+`');
              var count = document.getElementById('likecount-`+thisId+`');
              count.innerHTML = parseInt(count.innerHTML) - 1;
            }
          }})`)
        }
      );
    });
    </script>
  </head>
  <body>
    @component('header')
    @endcomponent
    @component('postsview')
      @slot('posts')
        @php
          $posts = DB::table('posts')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->select('users.username AS sender',
              'users.name AS name',
              'users.id AS user_id',
              'posts.content AS content',
              'posts.score AS score',
              'posts.id AS post_id',
              'posts.tags AS tags',
              'posts.date_posted AS date_posted')->orderBy('post_id', 'desc')->get();
          $Parsedown = new Parsedown();
        @endphp
        @foreach ($posts as $post)
          @if (in_array($searchfor, explode(',', $post->tags)))
            @component('post')
              @slot('content')
                {!!$Parsedown->text($post->content)!!}
              @endslot
              @slot('tags')
                {{$post->tags}}
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
              @slot('user_id')
                {{$post->user_id}}
              @endslot
              @slot('score')
                {{$post->score}}
              @endslot
              @slot('id')
                {{$post->post_id}}
              @endslot
              @slot('displayuser')
                {{'yes'}}
              @endslot
            @endcomponent
          @endif
        @endforeach
      @endslot
    @endcomponent
  </body>
  <script>
    var msnry;
    msnry = new Masonry( '.grid', {
      itemSelector: '.grid-item',
      columnWidth: 450,
      gutter: 30,
      fitWidth: true,
      transitionDuration: '0.3s',
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

    function test() {
      console.log("test");
    }

    var elem = document.querySelector('.container');
    var infScroll = new InfiniteScroll( elem, {
      // options
      path: '[rel="next"]', // selector for laravel-generated next page button
      append: '.post',
      history: false,
      outlayer: msnry
    });
    infScroll.on('append', function(response, path, items) {
      console.log("rl");
      $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
      });
    })
  </script>
</html>
