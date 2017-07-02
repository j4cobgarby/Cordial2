<div class="post grid-item" id="post-{{$id}}">
  <div class="content">
    {!!$content!!}
    <script>
      var content = document.currentScript.parentElement;
      console.log(content.clientHeight);
      if (content.clientHeight >= 504) {
        var expandbtn = document.createElement("div");
        expandbtn.setAttribute("class", "expand-button");
        expandbtn.setAttribute("title", "Expand");
        expandbtn.innerHTML = '<i class="fa fa-arrow-down" aria-hidden="true"></i>';
        expandbtn.setAttribute("onclick", 'this.parentElement.classList.add("expanded");reload()');
        content.appendChild(expandbtn);
      }
    </script>
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
