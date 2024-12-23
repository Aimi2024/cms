<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>CMS</title>

</head>
<body>

<nav>
    <x-nav-link href="/" :active="request()->is('index')">
        Dashboard
    </x-nav-link>
    <x-nav-link href="/medicine" :active="request()->is('index')">
        medicine
    </x-nav-link>
</nav>



        {{ $slot }}



</body>
</html>
