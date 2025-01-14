<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        @if(session()->has("success")) 
          <div class="alert alert-success">{{session()->get("success")}}</div>
        @endif
        @if(session()->has("error")) 
          <div class="alert alert-success">{{session()->get("error")}}</div>
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
          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color:#333">Prijava</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>