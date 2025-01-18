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

<section>
    @include('partials.navbar')
</section>

<section>
<div class="displayed_content">

    <div class="qr_container">
        <div class="qr_pic">
            <span>SLIKA QR KODE</span>
        </div>
    </div>
</div>
</section>

<section>
    @include('partials.footer')
</section>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
