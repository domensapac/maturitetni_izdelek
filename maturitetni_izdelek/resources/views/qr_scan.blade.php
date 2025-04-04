<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>MojBon</title>
</head>

<body>
    <section>
        @include('partials.navbar')
    </section>

    <div class="displayed_content">
        <h1>SKENIRANJE QR</h1>

        <!-- Neviden obrazec za pošiljanje podatkov -->
        <form action="{{ route('qr.scan') }}" method="POST" id="qrForm">
            @csrf
            <input type="hidden" name="user_id" id="user_id" required>
        </form>

        @if(session('success'))
            <div class="alert alert-light">
                {{ session('success') }}
            </div>
        @endif

        @if(session('user_name'))
            <div class="alert alert-light">
                Skeniral: <strong> {{ session('user_name')}}  </strong>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-dark">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <section>
        @include('partials.footer')
    </section>

    <script>
        let scannedCode = '';
        let scanTimeout;

        // Poslušaj pritiske tipk na celotnem dokumentu
        document.addEventListener('keypress', function (e) {
            clearTimeout(scanTimeout); // Ponastavi timer

            // Prepreči zajem posebnih znakov (npr. Enter)
            if (e.key.length === 1) {
                scannedCode += e.key;
            }

            // Nastavi timeout za obdelavo (100 ms)
            scanTimeout = setTimeout(function () {
                if (scannedCode) {
                    document.getElementById('user_id').value = scannedCode;
                    document.getElementById('qrForm').submit();
                    scannedCode = '';
                }
            }, 100); // Časovna zakasnitev po skeniranju
        });


    </script>

</body>

</html>
