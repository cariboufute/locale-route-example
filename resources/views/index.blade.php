<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Index test page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>

    <body>
        <p>
            Current route: <strong>{{ Request::route()->getName() }}</strong><br/>
            Current URL: <strong>{{ locale_route() }}</strong>
        </p>

        <p>
            <a href="{{ other_locale('fr') }}">FR locale, current route</a>
        </p>

        <p>
            <a href="{{ other_locale('en') }}">EN locale, current route</a>
        </p>


        <p>
            <a href="{{ other_route('index') }}">Current locale, index route</a>
        </p>

        <p>
            <a href="{{ locale_route('fr', 'index') }}">FR locale, index route</a>
        </p>

        <p>
            <a href="{{ locale_route('en', 'index') }}">EN locale, index route</a>
        </p>


        <p>
            <a href="{{ other_route('test2') }}">Current locale, test2 route</a>
        </p>

        <p>
            <a href="{{ locale_route('fr', 'test2') }}">FR locale, test2 route</a>
        </p>

        <p>
            <a href="{{ locale_route('en', 'test2') }}">EN locale, test2 route</a>
        </p>

    </body>
</html>
