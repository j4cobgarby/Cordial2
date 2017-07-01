<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    @component('styles')
    @endcomponent
    <link rel="stylesheet" href="{!! asset('css/auth.css') !!}">
  </head>
  <body>
    <form class="taller" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}

      <span class="title">cordial</span>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="name-wrap">
          <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

          @if ($errors->has('name'))
            <span class="help-block taller">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="email-wrap">
          <input id="email" type="email" placeholder="Email address" class="form-control" name="email" value="{{ old('email') }}" required>

          @if ($errors->has('email'))
            <span class="help-block taller">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="password-wrap">
          <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

          @if ($errors->has('password'))
            <span class="help-block taller">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="confirm-wrap">
          <input id="password-confirm" type="password" placeholder="Repeat password" class="form-control" name="password_confirmation" required>
        </div>
      </div>

      <div class="form-group">
        <div class="submit-wrap">
          <button type="submit" class="button-big close-right">
            Register
          </button>
        </div>
      </div>
    </form>
  </body>
</html>
