<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Comment App</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}" type="text/css" media="screen" charset="utf-8"> 
    </head>
    <body>
        <div id="app">
            <root-component></root-component>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
