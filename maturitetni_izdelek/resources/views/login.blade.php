<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MojBon</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <section class="vh-100 prijava-ozadje">
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-7 prijava-naslov"><strong>MojBon.</strong></div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 prijava-text">
        @if(session()->has("success")) 
          <div class="alert alert-light">{{session()->get("uspeh")}}</div>
        @endif
        @if(session()->has("error")) 
          <div class="alert alert-dark">{{session()->get("error")}}</div>
        @endif
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form1Example13" class="form-control form-control-lg" name="email" required autofocus/>
            <label class="form-label" for="form1Example13">Email naslov</label>
          </div>

          <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" required />
            <label class="form-label" for="form1Example23">Geslo</label>
          </div>
          <div class=" d-flex align-items-center justify-content-center">
          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" style="background-color: rgb(32,32,32)">Prijava</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>