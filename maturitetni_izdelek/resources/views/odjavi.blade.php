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
    <h1>Odjavi malico</h1>

    <form method="POST" action="{{ route('odjavi.post') }}">
        @csrf
        <label for="datum">Izberi datum in čas:</label>
        <input type="date" id="datum" name="datum" required>

        <br><br>

        <div class=" d-flex align-items-center justify-content-center">
            <button style="background-color:#333;" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block ">Odjavi</button>
        </div>
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

<script>
        // Dobimo današnji datum v formatu YYYY-MM-DD
        let today = new Date().toISOString().split('T')[0];

        // Nastavimo najmanjši datum v input polju
        document.getElementById("datum").setAttribute("min", today);
    </script>
</body>
</html>
