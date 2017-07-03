<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cordial - Write</title>
    @component('styles')
    @endcomponent
    <link rel="stylesheet" href="{!! asset('css/write.css') !!}">
    <script>
      function toggleSwitchview() {
        var e = document.getElementById('switchview');
        if (e.innerHTML == '<i class="fa fa-eye" aria-hidden="true"></i>Preview') {
          e.innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i>Write';
        } else {
          e.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>Preview';
        }
      }
      function SwitchviewInit() {
        var e = document.getElementById('switchview');
        e.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>Preview';
      }
    </script>
  </head>
  <body onload="SwitchviewInit()">
    @component('header')
    @endcomponent
    <form class="write" action="" method="post">
      {{ csrf_field() }}
      <textarea maxlength="6000" placeholder="Write something interesting!" name="content" required></textarea>
      <input class="button-big close-center" type="submit" name="submit" value="Post!">
      <button type="button" onclick="toggleSwitchview()" class="switchview" id="switchview">
      </button>
    </form>
  </body>
</html>
