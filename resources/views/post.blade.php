<div class="post grid-item" id="post-{{$id}}">
  <div class="content">{!!stripslashes($content)!!}
    <script>
      var content = document.currentScript.parentElement;
      console.log(content.clientHeight);
      if (true) {
        var expandbtn = document.createElement("div");
        expandbtn.setAttribute("class", "expand-button");
        expandbtn.setAttribute("title", "Show all");
        expandbtn.innerHTML = '<i class="fa fa-expand" aria-hidden="true"></i>';
        expandbtn.setAttribute("onclick", 'resetSelected();this.parentElement.classList.add("expanded");this.parentElement.parentElement.classList.add("expanded")');
        content.appendChild(expandbtn);
      }
    </script>
  </div>
  <span class="by"
  onmouseout="this.innerHTML='{{$name}}'"
  onmouseover="this.innerHTML='{{'@'.$username}}'">
    {{$name}}
  </span>
  <span class="date">{{$date}}</span>
  <span class="status">
    @if (sizeof(DB::select('SELECT * FROM users_liked_posts WHERE post_id = ? AND user_id = ?', [$id, $user_id])) != 0)
      {{-- When the current post is liked --}}
      <span class="likes liked" id="likebtn-{{$id}}">
        <i class="fa fa-heart" aria-hidden="true"></i>
        {{$score}}
      </span>
    @else
      {{-- Or, if it's not liked --}}
      <span class="likes" id="likebtn-{{$id}}">
        <i class="fa fa-heart" aria-hidden="true"></i>
        {{$score}}
      </span>
    @endif
    <span class="comments">
      <i class="fa fa-comment" aria-hidden="true"></i>
      0
    </span>
  </span>
</div>
