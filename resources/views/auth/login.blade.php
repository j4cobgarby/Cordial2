<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign in</title>
    @component('styles')
    @endcomponent
    <link rel="stylesheet" href="{!! asset('css/auth.css') !!}">
  </head>
  <body>
    <form method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}

      <span class="title">cordial</span>

      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

        <div class="username">
          <input id="username" type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

          @if ($errors->has('username'))
            <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="password-wrap">
          <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="remember-wrap">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Stay logged in?
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="submit-wrap">
          <button type="submit" class="button-big close-right">
            Login
          </button>
        </div>
      </div>
    </form>
  </body>
</html>
