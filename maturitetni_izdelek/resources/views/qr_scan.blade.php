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
    <h1>SKENIRANJE QR</h1>

    <form action="{{ route('qr.scan') }}" method="POST">
        @csrf
        <label for="user_id">QR Code ID:</label>
        <input type="text" name="user_id" id="user_id" required autofocus>
    </form>

    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>



<section>
    @include('partials.footer')
</section>

</body>
</html>
