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
                <a href="https://github.com/j4cobgarby/Cordial2"><i class="fa fa-code-fork" aria-hidden="true"></i> fork on GitHub</a>
                <a href="mailto:j.garby@icloud.com?Subject=From%20Cordial!"><i class="fa fa-envelope" aria-hidden="true"></i> email me</a>
            </span>
            <br>
            <button class="button-big close-right" onclick="window.location.href='/register'">Register here</button>
            <br>
            <button class="button-big close-left" onclick="window.location.href='/login'">Sign in</button>
            <br><br>
        </div>
        <span class="legal">
            <b class="hover-say">Hover me for legal info</b>
            <br>
            This page and all other pages on this domain are protected under <b>GNU GPL v3.0</b>, excluding files which aren't included in Cordial's github repository.
            <br>
            Copyright &copy; 2017 Jacob Garby All Rights Reserved.
        </span>
    </body>
</html>
