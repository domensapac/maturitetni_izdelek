<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>

<section>
    @include('partials.navbar')
</section>

<div class="displayed_content">
    <h1>Dodatno</h1>
</div>

<section>
    @include('partials.footer')
</section>

</body>
</html>
