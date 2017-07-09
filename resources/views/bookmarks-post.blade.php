<div class="post grid-item" id="post-{{$id}}">
  <div class="content">{!!stripslashes($content)!!}
    <div class="expand-button" title="Show all"
    onclick='resetSelected();
      this.parentElement.classList.add("expanded");
      this.parentElement.parentElement.classList.add("expanded")'>
      <i class="fa fa-expand" aria-hidden="true"></i>
    </div>
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

    <span class="comments">
      <i class="fa fa-comment" aria-hidden="true"></i>
      0
    </span>

    <span class="bookmark">
      <i id="{{$id}}" class="fa fa-bookmark {{echoBookmarkClass($id)}}" aria-hidden="true" onclick="
$('span.bookmark i#{{$id}}').toggleClass('bookmarked');
execphp('bookmark', '{{$id}}');
msnry.remove(document.getElementById('post-{{$id}}'));
reload();
      "></i>
    </span>

    @if (userOwnsPost($id))
      <span class="edit" onclick="window.location.href='/write/{{$id}}'">
        <i class="fa fa-pencil" aria-hidden="true"></i>
      </span>
      <span class="delete" onclick="
if (confirm('Are you sure you want to delete this post? There\'s no going back.')) {
  execphp('delete', '{{$id}}');
  msnry.remove(document.getElementById('post-{{$id}}'));
  reload();
}
      ">
        <i class="fa fa-trash" aria-hidden="true"></i>
      </span>
    @endif
  </span>
  <div class="tags-wrapper">
    @foreach (explode(',', $tags) as $tag)
      <span class="tag">
        {{$tag}}
      </span>
    @endforeach
  </div>
</div>
