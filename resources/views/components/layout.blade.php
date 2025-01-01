<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
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

    /* side nav */
    #mySidenav {
        transition: all 0.5s;
    }

    #mySidenav.collapsed {
        width: 85px;
    }

    #mySidenav.collapsed .nav-text {
        display: none;
    }

    #mySidenav.collapsed .nav-icon {
        display: block;
    }

    .nav-icon {
        display: none;
    }

    .nav-text {
        display: inline;
        width: 100%;
    }

    .transition-transform {
        transition: transform 0.3s ease-in-out;
    }
    </style>
</head>

<body>

    <div class="flex flex-row w-screen h-dvh font-poppins bg-[#E6F7F9] overflow-x-hidden">

        <nav id="mySidenav"
            class="relative whitespace-nowrap overflow-hidden w-72 h-dvh flex flex-col bg-[#FDF6EC] px-10 py-12 border-r rounded-r-3xl justify-between items-center transition-all duration-300 collapsed">

            <button id="toggleButton" onclick="toggleNav()" class="absolute top-6 right-8 w-7 h-7">
                <x-uni-left-arrow-from-left-o id="arrowIcon" class="transition-transform duration-300 rotate-180" />
            </button>

            <div class="flex flex-col items-center justify-center w-full gap-8 px-[2px] mt-16 font-semibold h-fit">

                <x-nav-link href="/dashboard" :active="request()->is('dashboard')">
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('dashboard.svg') }}" alt="dashboard">
                    </span>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </x-nav-link>

                <x-nav-link href="/medicine"
                    :active="request()->is('medicine') || request()->is('*addmedicine') || request()->is('medicine/deduct/*')"
                    class="w-full flex justify-center">
                    <span class=" flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('medicine.svg') }}" alt="medicine" class="">
                    </span>
                    <span class="nav-text">
                        Medicine
                    </span>
                </x-nav-link>

                <x-nav-link href="/equipments" :active="request()->is('equipments')" class="w-full flex justify-center">
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('equipment.svg') }}" alt="equipment">
                    </span>
                    <span class="nav-text">
                        Equipments
                    </span>
                </x-nav-link>
                @auth
                @if(auth()->user()->type === 'admin')
                <x-nav-link href="/account" :active="request()->is('account') || request()->is('account/register')"
                    class="w-full flex justify-center">
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('account.svg') }}" alt="account">
                    </span>
                    <span class="nav-text">
                        Accounts
                    </span>
                </x-nav-link>

                @endif
                @endauth

            </div>

            <form class="w-full" method="POST" action="/logout">
                @csrf
                @method("POST")
                <button class="w-full flex justify-center" type="submit">
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('logout.svg') }}" alt="logout">
                    </span>
                    <span
                        class="nav-text text-[#FD7E14] border-2 border-[#FD7E14] rounded-lg py-2 hover:bg-[#FD7E14] hover:text-white font-bold transition-all duration-300">
                        Log Out
                    </span>
                </button>
            </form>
        </nav>

        <div class="w-full h-dvh flex flex-col">
            <div class="w-full h-fit bg-transparent">
                <!-- header -->
                <div class="flex flex-row items-center justify-between px-20 py-6">
                    <div class="flex flex-row gap-2">
                        <p>hello</p>
                        <p>this</p>
                    </div>
                    <div>
                        @auth
                            Hello!, <b> {{ Auth::user()->username }}</b>
                        @else
                            Hello, Guest!
                        @endauth
                    </div>
                </div>


            </div>

            {{ $slot }}

        </div>
    </div>

    <script>
    function toggleNav() {
        const sidenav = document.getElementById('mySidenav');
        const arrowIcon = document.getElementById('arrowIcon');

        sidenav.classList.toggle('collapsed');

        if (sidenav.classList.contains('collapsed')) {
            arrowIcon.style.transform = 'rotate(180deg)';
        } else {
            arrowIcon.style.transform = 'rotate(0deg)';
        }
    }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>
