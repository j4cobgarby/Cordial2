<div class="header-section">
  <span class="header-logo" onclick="window.location.href='{{ URL::to('/') }}'">cordial</span>
  <script src="{!! asset('js/dropdown.js') !!}" charset="utf-8"></script>

  @if (Auth::check())
    <span class="username-disp" onclick="toggle()">
      <i class="fa fa-user-circle" aria-hidden="true"></i>
      {{ firstName(Auth::user()->name) }}
      <div id="arrow" class="arrow-down"></div>
    </span>
    <div id="d-auth" class="dropdown-auth">
      <a href="/devlogout"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a><br>
      <a href="/settings"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
      <a href="/user/{{ Auth::user()->username }}"><i class="fa fa-user-circle" aria-hidden="true"></i>You</a>
    </div>

    <span class="bookmark-icon" onclick="window.location.href='/bookmarked'">
      <i class="fa fa-bookmark" aria-hidden="true"></i>
    </span>
    <span class="newpost-icon" onclick="window.location.href='/write'">
      <i class="fa fa-paper-plane" aria-hidden="true"></i>
    </span>
    <form class="search-form" action="/search" method="get">
      <input type="text" name="q" placeholder="Search" @php
if (Request::get('q') !== null) {
  echo "value=\"".Request::get('q')."\"";
}
      @endphp required>
    </form>
  @else
    <span class="login" onclick="toggle()">
      Not signed in
      <div id="arrow" class="arrow-down"></div>
    </span>
    <div id="d-notauth" class="dropdown-notauth">
      <a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a><br>
      <a href="/register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
      <a href="https://github.com/j4cobgarby/Cordial2"><i class="fa fa-github" aria-hidden="true"></i>GitHub</a>
    </div>
  @endif

  <script>
    init();
    $(document).keydown(function(e) {
      if (e.keyCode == 27) { // Escape
        document.activeElement.blur();
      }
    });
  </script>
</div>
