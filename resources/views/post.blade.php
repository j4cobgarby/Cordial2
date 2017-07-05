<div class="post grid-item" id="post-{{$id}}">
  <div class="content">{!!stripslashes($content)!!}
    <script>
      var content = document.currentScript.parentElement;
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
  @if ($displayuser == 'yes')
    <span class="by"
    onmouseout="this.innerHTML='{{$name}}'"
    onmouseover="this.innerHTML='{{'@'.$username}}'"
    onclick="window.location.href='user/{{$username}}'">
      {{$name}}
    </span>
  @endif
  <span class="date">{{time_elapsed_string($date)}}</span>
  <span class="status">
    @if (!canLikePost($id))
      {{-- When the current post is liked --}}
      <span class="likes liked" id="likebtn-{{$id}}">
        <i id="likeicon-{{$id}}" class="fa fa-heart" aria-hidden="true"></i>
        <span id="likecount-{{$id}}" class="scorecount">{{$score}}</span>

      </span>
    @else
      {{-- Or, if it's not liked --}}
      <span class="likes" id="likebtn-{{$id}}">
        <i id="likeicon-{{$id}}" class="fa fa-heart" aria-hidden="true"></i>
        <span id="likecount-{{$id}}" class="scorecount">{{$score}}</span>
      </span>
    @endif
    {{--
    <span class="comments">
      <i class="fa fa-comment" aria-hidden="true"></i>
      0
    </span>
    --}}
    <span class="bookmark">
      <i class="fa fa-bookmark" aria-hidden="true"></i>
    </span>
  </span>
</div>
