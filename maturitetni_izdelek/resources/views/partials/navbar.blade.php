<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MojBon</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    </head>
<body>

<nav class="navbar1 "> 
        <div class="brand-title1" style="font-family:Outfit"><strong>MojBon.</strong></div>
        <div href="#" class="toggle-button1">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <div id="menu" class="navbar-links1">
            <ul>
                <li ><a href="/">Domov</a></li>
                @auth
                    @if(Auth::user()->admin == 1)
                        <li><a href="{{ route('admin') }}">Admin</a></li>
                        <li><a href="{{ route('qrscan') }}">Skeniranje</a></li>
                    @endif
                @endauth

                    <li><a href="{{ route('odjavi') }}">Odjavi malico</a></li>
                    <li><a href="{{ route('racun') }}">Račun</a></li>
                    <li><a href="{{ route('logout') }}">Odjava</a></li>
            </ul>
        </div>
</nav>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
