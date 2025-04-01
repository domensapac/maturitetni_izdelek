<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>MojBon</title>
</head>
<body>

<section>
    @include('partials.navbar')
</section>


<div class="displayed_content">

<h1> Dobrodošel/la, {{ auth()->user()->name }}!</h1>

<form method="POST" action="{{ route('racun.post') }}">
    @csrf
    @if(session()->has("success")) 
        <div class="alert alert-light">{{session()->get("success")}}</div>
    @endif
    @if(session()->has("error")) 
        <div class="alert alert-dark">{{session()->get("error")}}</div>
    @endif
    
    <div data-mdb-input-init class="form-outline mb-4 barva-okvira-racun">
        <input type="password" id="racunPos"  class="form-control form-control-lg" name="password" required/>
        <label class="form-label" for="racunPos">Tranutno geslo</label>
    </div>

    <div data-mdb-input-init class="form-outline mb-4 barva-okvira-racun">
        <input type="password" id="racunPos"  class="form-control form-control-lg" name="newpassword" required/>
        <label class="form-label" for="racunPos">Novo geslo</label>
    </div>

    <div class=" d-flex align-items-center justify-content-center">
        <button style="background-color: rgb(32,32,32); color:white" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block ">Posodobi</button>
    </div>

</form>

</div>



<section>
    @include('partials.footer')
</section>



</body>
</html>