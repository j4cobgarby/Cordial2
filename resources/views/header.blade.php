<div class="header-section">
  <span class="header-logo" onclick="window.location.href='{{ URL::to('/') }}'">cordial</span>
  <script src="{!! asset('js/dropdown.js') !!}" charset="utf-8"></script>

  @if (Auth::check())
    <span class="username-disp" onclick="toggle()">
      <i class="fa fa-user-circle" aria-hidden="true"></i>
      {{ explode(' ', Auth::user()->name)[0] }}
      <div id="arrow" class="arrow-down"></div>
    </span>
    <div id="d-auth" class="dropdown-auth">
      <a href="/devlogout"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a><br>
      <a href="/settings"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
      <a href="/user/{{ Auth::user()->username }}"><i class="fa fa-user-circle" aria-hidden="true"></i>You</a>
    </div>
  @else
    <span class="login" onclick="toggle()">
      Not signed in
      <div id="arrow" class="arrow-down"></div>
    </span>
    <div id="d-notauth" class="dropdown-notauth">
      <a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a><br>
      <a href="/register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
    </div>
  @endif

  <script> init(); </script>
</div>
