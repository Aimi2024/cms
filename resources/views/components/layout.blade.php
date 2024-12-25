<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/style.css')

    @vite('resources/css/app.css')
    <title>CMS</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        text-align: center;
        margin-top: 20px;
        /* Adjust the value as needed */
    }

    td,
    th {
        border: 1px solid rgb(185, 185, 185);
        border-left: none;
        border-right: none;
        padding: 15px;
    }
    </style>
</head>

<body>
    <div class="flex flex-row w-screen h-dvh font-poppins bg-[#E6F7F9]">

        <nav id="mySidenav"
            class="relative overflow-hidden w-72 h-dvh flex flex-col bg-[#FDF6EC] px-10 py-12 border-r rounded-r-3xl justify-between transition-all duration-300">

            <button onclick="closeNav()" class="absolute top-6 right-8 w-7 h-7">
                <x-uni-left-arrow-from-left-o />
            </button>

            <div class="flex flex-col items-center justify-center w-full gap-8 px-[2px] mt-16 font-semibold h-fit">
                <x-nav-link href="/dashboard" :active="request()->is('dashboard')">
                    Dashboard
                </x-nav-link>
                <x-nav-link href="/medicine"
                    :active="request()->is('medicine') || request()->is('*addmedicine') || request()->is('medicine/deduct/*')">
                    Medicine
                </x-nav-link>
                <x-nav-link href="/equipments" :active="request()->is('equipments')">
                    Equipments
                </x-nav-link>
                @auth
                @if(auth()->user()->type === 'admin')
                    <x-nav-link href="/account" :active="request()->is('account')">
                        Accounts
                    </x-nav-link>
                @endif
            @endauth

            </div>
            <form method="POST" action="/logout">
                @csrf
                @method("POST")
                <button
                    class="text-[#FD7E14] border-2 border-[#FD7E14] w-full rounded-lg py-2 hover:bg-[#FD7E14] hover:text-white font-bold"
                    type="submit">
                    Log Out
                </button>
            </form>
        </nav>

        <div class="w-full h-dvh flex flex-col">
            <div class="w-full h-fit bg-transparent">
                <!-- header -->
                <div class="flex flex-row items-center justify-between px-20 py-6">
                    <div>Navigation Url</div>
                    <div>Profile</div>
                </div>
            </div>

            {{ $slot }}

        </div>
    </div>

    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "288px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>
