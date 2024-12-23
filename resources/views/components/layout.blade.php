<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <title>CMS</title>

</head>

<body>
    <div class="flex flex-row w-screen h-dvh">
        <nav class="w-fit h-dvh flex flex-col bg-[#FDF6EC] px-10 py-12 border-r rounded-r-3xl justify-between">
            <div class="flex flex-col items-center justify-center w-full gap-8 px-5 mt-16 font-semibold h-fit ">
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

        <div class="w-full h-dvh flex flex-col">
            <div class="w-full h-fit bg-transparent">
                <div class="flex flex-row items-center justify-between px-20 py-6">
                    <div>Navigation Url</div>
                    <div>Profile</div>
                </div>
            </div>

            {{ $slot }}

        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>
