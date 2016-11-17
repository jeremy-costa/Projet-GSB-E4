<!doctype html>
<html lang="fr">
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @section('entete')
           C'est la partie entête du master
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
