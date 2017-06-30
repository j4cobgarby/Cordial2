<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cordial</title>

        <!-- Styles -->
        @component('styles')
        @endcomponent
        <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}">
    </head>
    <body>
        @component('header')
        @endcomponent

        <div class="middle" id="middle">
            <span class="title">cordial</span>
            <span class="links">
                <a href="https://github.com/j4cobgarby/Cordial2">github</a>
                <a href="http://jacobgarby.co.uk">my homepage</a>
            </span>
            <br>
            <button class="button-big">Register here</button>
            <br>
            <span>Or alternatively, sign in <a href="login">here</a></span>
        </div>
    </body>
</html>
