<div class="header-section">
  <span class="header-logo" onclick="window.location.href='{{ URL::to('/') }}'">cordial</span>
  <script src="{!! asset('js/dropdown.js') !!}" charset="utf-8"></script>

  @if (Auth::check())
    <span class="username-disp" onclick="toggle()">Logged in as {{ Auth::user()->name }}<div class="arrow-down"></div></span>
    <div id="d-auth" class="dropdown-auth">
      <a href="/devlogout">Log out</a><br>
      <a href="/settings">Settings</a>
    </div>
  @else
    <span class="login" onclick="toggle()">Not logged in!<div class="arrow-down"></div></span>
    <div id="d-notauth" class="dropdown-notauth">
      <a href="/login">Log in</a><br>
      <a href="/register">Register</a>
    </div>
  @endif

  <script> init(); </script>
</div>
