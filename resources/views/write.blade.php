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
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script>
      function toggleSwitchview() {
        var e = document.getElementById('switchview');
        if (e.innerHTML == '<i class="fa fa-eye" aria-hidden="true"></i>') {
          e.innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i>';
        } else {
          e.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
        }
        document.getElementById('preview').classList.toggle("hidden");

        updatePreview();
      }

      function SwitchviewInit() {
        var e = document.getElementById('switchview');
        e.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
      }
    </script>
  </head>
  <body onload="SwitchviewInit()">
    @php
      $editing = false;
      if (Request::route('id') != '') {
        $id = Request::route('id');
        $editing = true;
        $edited_post = DB::select('SELECT * FROM posts WHERE id = ?', [$id])[0];
      }
    @endphp

    @component('header')
    @endcomponent
    <form class="write" action="" method="post">
      {{ csrf_field() }}
      <textarea maxlength="6000" placeholder="Write something interesting! You should use Markdown - it's really cool!" name="content" id="content" required>@php
if ($editing) {
  echo $edited_post->content;
}
        @endphp</textarea>
      <input type="text" name="tags" placeholder="Type up to 5 tags, seperated by commas"><br>
      <button type="submit" name="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      <button type="button" onclick="toggleSwitchview()" class="switchview" id="switchview">
      </button>
    </form>
    <div id="preview" class="preview hidden"></div>
    <script>
      var converter = new showdown.Converter({extensions: ['table']});
      function updatePreview() {
        if (document.getElementById('content').value != '') {
          document.getElementById('preview').innerHTML = converter.makeHtml(document.getElementById('content').value);
        } else {
          document.getElementById('preview').innerHTML = 'Your post can\'t be previewed yet because you haven\'t written anything!';
        }
      }

      $(document).keyup(function(e) {
        if (e.keyCode == 27) { // Escape
          console.log("test");
          window.location.href = "/";
        }
      });
    </script>
  </body>
</html>
