<!DOCTYPE html>
<html lang="{{ service('language')->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organizador de tareas</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="navbar">
        <div>
            <a href="/">{{ lang('App.home') }}</a>
            <a href="/lang/en">{{ lang('App.english') }}</a>
            <a href="/lang/es">{{ lang('App.spanish') }}</a>
        </div>
        <div>
            <a href="#">{{ lang('App.signup') }}</a>
            <a href="#">{{ lang('App.login') }}</a>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
