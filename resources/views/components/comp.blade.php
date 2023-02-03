<!DOCTYPE html>
<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <!-- Si queremos evitar declarar 
        constantemente con un x-slot,
        podemos llamar a la variable slot
        y de esta manera no sera necesario
        darle un nombre dentro del blade -->
    {{ $slot }}
</body>