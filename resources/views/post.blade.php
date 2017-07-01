<div class="post grid-item">
  <div class="content">
    {!!$content!!}
  </div>
  <span class="by"
  onmouseout="this.innerHTML='{{$username}}'"
  onmouseover="this.innerHTML='{{$name}}'">
    {{$username}}
  </span>
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
