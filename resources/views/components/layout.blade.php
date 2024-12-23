<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <title>CMS</title>

</head>
<body>

    <nav class="w-fit h-dvh flex flex-col bg-[#FDF6EC] px-10 py-12 border-r rounded-r-3xl justify-between">

        <div class="w-full h-fit flex flex-col gap-8 mt-16 px-5 justify-center   items-center font-semibold ">

            <x-nav-link href="/dashboard" :active="request()->is('dashboard')">
                Dashboard
            </x-nav-link>

            <x-nav-link href="/medicine" :active="request()->is('medicine') || request()->is('*product')">
                Medicine
            </x-nav-link>



            <x-nav-link href="/equipments" :active="request()->is('equipments')">
                Equipments
            </x-nav-link>
            <x-nav-link href="/accounts" :active="request()->is('accounts')">
                Accounts
            </x-nav-link>

        </div>

        <form method="POST" action="/logout">
            @csrf
            @method("POST")
            {{-- <x-button-logout>Log out</x-button-logout> --}}
       </form>
    </nav>



        {{ $slot }}



</body>
</html>
