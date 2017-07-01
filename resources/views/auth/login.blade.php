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
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}

      <span class="title">cordial</span>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="email">
          <input id="email" type="email" placeholder="Email address" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
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
