<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cordial - Write</title>
    @component('styles')
    @endcomponent
    <link rel="stylesheet" href="{!! asset('css/write.css') !!}">
    <script src="{!! asset("js/showdown.min.js") !!}" charset="utf-8"></script>
    <script src="{!! asset("js/showdown-table.min.js") !!}" charset="utf-8"></script>
    <script>
      function toggleSwitchview() {
        var e = document.getElementById('switchview');
        if (e.innerHTML == '<i class="fa fa-eye" aria-hidden="true"></i>Preview') {
          e.innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i>Write';
        } else {
          e.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>Preview';
        }
        document.getElementById('preview').classList.toggle("hidden");
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
      <textarea maxlength="6000" placeholder="Write something interesting!" name="content" id="content" required></textarea>
      <input class="button-big close-center" type="submit" name="submit" value="Post!">
      <button type="button" onclick="toggleSwitchview()" class="switchview" id="switchview">
      </button>
    </form>
    <div id="preview" class="preview hidden"></div>
    <script>
    var converter = new showdown.Converter({extensions: ['table']});
      setInterval(function() {
        if (document.getElementById('content').value != '') {
          document.getElementById('preview').innerHTML = converter.makeHtml(document.getElementById('content').value);
        } else {
          document.getElementById('preview').innerHTML = '<i>Nothing yet!</i>';
        }
      }, 20);
    </script>
  </body>
</html>
