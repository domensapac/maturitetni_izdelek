<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> 
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    
<body>

    <nav class="navbar"> 
        <div class="brand-title">SPTŠ</div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="#">Domov</a></li>
                <li><a href="{{ route('logout') }}">Odjava</a></li>
            </ul>
        </div>
    </nav>

<section>

<div class="qr_container">
    <div class="qr_pic">
        <span>SLIKA QR KODE</span>
    </div>
</div>

</section>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
