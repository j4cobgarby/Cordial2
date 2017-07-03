<div class="grid-item greeting">
  Hello there,<br>
  <span class="username">
    {{explode(' ', Auth::user()->name)[0]}}! {{-- Get user's first name --}}
  </span>
  <br>
  <span class="details">
    <span class="sect like">
      <i class="fa fa-heart" aria-hidden="true"></i> 0
    </span>
    <span class="sect comment">
      <i class="fa fa-comment" aria-hidden="true"></i> 0
    </span>
    <span class="sect mention">
      <i class="fa fa-exclamation" aria-hidden="true"></i> 0
    </span>
  </span>
</div>
