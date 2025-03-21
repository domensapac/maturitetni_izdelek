<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moj Bon</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
<body>

<section>
    @include('partials.navbar')
</section>

<section>
<div class="displayed_content">

    <p class="user_name"> {{ Auth::user()->name ?? 'Gost' }} {{ Auth::user()->surname ?? '' }} </p>

    <div class="qr_container">

        <div class="qr_pic">
            {!! $qrCode !!} 
        </div>
    </div>
</div>
</section>

<section class="other_content">

    <div class="content_row">
        <h1>Kako do malice?</h1>
    </div>
   
    <div class="content_row">
        <div class="text_box">
            <h2>Poskeniraj kodo</h2>
            <p>Pripravite aplikacijo z vašo QR kodo in jo usmerite proti skenerju. Pomembno je, da je koda jasno vidna in v celoti zajeta v okviru kamere. Ko bo koda uspešno prepoznana, boste prejeli potrditev o skeniranju.</p>
        </div>
        <div class="image_box">
            <img src="{{ asset('images/app.png') }}" alt="Slika aplikacije">
        </div>
    </div>

    <div class="content_row reverse">
        <div class="image_box">
            <img src="{{ asset('images/success.png') }}" alt="Slika uspeh">
        </div>
        <div class="text_box">
            <h2>Prejmi malico</h2>
            <p>
            Ko je vaša QR koda uspešno skenirana, bo sistem preveril vašo upravičenost do obroka. Nato lahko prevzamete svojo malico hitro in brez nepotrebnega čakanja. Poskrbite, da bo vaša koda vedno pravilno usmerjena in vidna, da preprečite morebitne težave pri skeniranju.
            </p>
        </div>
    </div>
</section>


<section>
    @include('partials.footer')
</section>

<script src="{{ asset('js/script.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const otherContent = document.querySelector(".other_content");
    const footer = document.querySelector("footer");

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                    observer.unobserve(entry.target); // Stop observing once visible
                }
            });
        },
        { threshold: 0.2 } // Trigger when 20% of the element is visible
    );

    observer.observe(otherContent);
    observer.observe(footer);
});

</script>
</body>
</html>
