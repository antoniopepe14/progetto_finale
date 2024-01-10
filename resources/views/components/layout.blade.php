<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" bg-light preload">
    <x-navbar />

    {{ $slot }}

    <x-footer />


    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
</body>

</html>
