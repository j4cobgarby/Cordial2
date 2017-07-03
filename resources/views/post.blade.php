<div class="post grid-item" id="post-{{$id}}">
  <div class="content">
    {!!html_entity_decode($content)!!}
    <script>
      var content = document.currentScript.parentElement;
      console.log(content.clientHeight);
      if (/*content.clientHeight >= 504*/ true) {
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
