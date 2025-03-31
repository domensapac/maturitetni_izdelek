<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>MojBon</title>
</head>
<body>

<div class="footer-container">
    <div class="container" >
    <footer class="py-3">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-light">Domov</a></li>
        <li class="nav-item"><a href="{{ route('racun') }}" class="nav-link px-2 text-light">Račun</a></li>
        <li class="nav-item"><a href="{{ route('odjavi') }}" class="nav-link px-2 text-light">Dodatno</a></li>
        </ul>
        <p class="text-center text-light">© 2025 Domen Sapac X Jure Zrim</p>
    </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
