<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cordial</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        @component('styles')
        @endcomponent
        <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}">
    </head>
    <body>
        <div class="middle" id="middle">
            {!! file_get_contents(asset('assets/vectors/cordial-logo.svg')) !!}
            <span class="links"><a href="#">GitHub</a><a href="#">Jacob</a></span>
        </div>
    </body>

    <script>
        setTimeout(function() {
            document.getElementById('middle').classList.add('change');
        }, 100);
    </script>
</html>
