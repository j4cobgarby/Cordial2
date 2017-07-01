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
</div>
