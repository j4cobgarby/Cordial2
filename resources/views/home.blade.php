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
      <div class="post grid-item greeting">Hello there, {{explode(' ', Auth::user()->name)[0]}}!</div>
      <div class="post grid-item">
        <div class="title">Hello, world!</div>
        <div class="content">
          <p>
          This is the contents of the post! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
        <span class="by">by Jacob Garby</span>
      </div>
    </div>
  </body>
</html>
