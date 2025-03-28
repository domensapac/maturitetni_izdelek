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

<form method="POST" action="{{ route('racun.post') }}">
    @csrf
    @if(session()->has("success")) 
        <div class="alert alert-success">{{session()->get("success")}}</div>
    @endif
    @if(session()->has("error")) 
        <div class="alert alert-danger">{{session()->get("error")}}</div>
    @endif

    <div data-mdb-input-init class="form-outline mb-4 barva-okvira-racun">
        <input type="text" id="form1Example13"  class="form-control form-control-lg" name="email" required autofocus/>
        <label class="form-label" for="form1Example13">Email naslov</label>
    </div>
    
    <div data-mdb-input-init class="form-outline mb-4 barva-okvira-racun">
        <input type="text" id="form1Example13"  class="form-control form-control-lg" name="password" required/>
        <label class="form-label" for="form1Example13">Geslo</label>
    </div>

    <div data-mdb-input-init class="form-outline mb-4 barva-okvira-racun">
        <input type="text" id="form1Example13"  class="form-control form-control-lg" name="newpassword" required/>
        <label class="form-label" for="form1Example13">Novo geslo</label>
    </div>

    <div class=" d-flex align-items-center justify-content-center">
        <button style="background-color:#333;" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block ">Posodobi</button>
    </div>

</form>

</div>



<section>
    @include('partials.footer')
</section>



</body>
</html>