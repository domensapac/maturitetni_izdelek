<!DOCTYPE html>
<html>
<head>
    <title>Dobrodošel v MojBon.</title>
</head>
<body>
    <h3>Zdravo, {{ $user->name }}</h3>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Začasno geslo:</strong> {{ $temp_password }}</p>
    <p>Za bolšo varnost ob prijavi v spletno stran geslo spremeni pod zavihkom "Račun".</p>
    <p>Pozdrav,<br>Ekipa MojBon.</p>
</body>
</html>