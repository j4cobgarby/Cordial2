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
  </body>
</html>
