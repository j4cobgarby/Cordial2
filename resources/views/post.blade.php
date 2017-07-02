<div class="post grid-item" id="post-{{$id}}">
  <div class="content">
    {!!$content!!}
  </div>
  <span class="by"
  onmouseout="this.innerHTML='{{$username}}'"
  onmouseover="this.innerHTML='{{$name}}'">
    {{$username}}
  </span>
  <div class="expand-button" title="Expand"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
  <span class="date">{{$date}}</span>
  <span class="status">
    <span class="likes">
      <i class="fa fa-heart" aria-hidden="true"></i>
      0
    </span>
    <span class="comments">
      <i class="fa fa-comment" aria-hidden="true"></i>
      0
    </span>
  </span>
</div>
