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
      <div class="grid-item greeting">Hello there, <br>
        <span class="username">
          {{explode(' ', Auth::user()->name)[0]}}!
        </span>
      </div>
      <div class="post grid-item">
        <div class="content">
          <h1>
            Hello, world!
          </h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
        <span class="by"><i class="fa fa-user" aria-hidden="true"></i> username</span>
      </div>
    </div>
  </body>
</html>
