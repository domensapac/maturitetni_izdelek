<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

<section>
    @include('partials.navbar')
</section>


<div class="displayed_content">

<h1> Dobrodošel/la, {{ auth()->user()->name }}!</h1>

</div>

</div>


<section>
    @include('partials.footer')
</section>



</body>
</html>