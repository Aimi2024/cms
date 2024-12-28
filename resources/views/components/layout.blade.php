<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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

    #arrowIcon {
        transition: transform 0.3s ease;
    }
    </style>
</head>

<body>
    @props(['active' => false])

    <div class="flex flex-row w-screen h-dvh font-poppins bg-[#E6F7F9]">

        <nav id="mySidenav"
            class="relative overflow-hidden w-72 h-dvh flex flex-col bg-[#FDF6EC] px-10 py-12 border-r rounded-r-3xl justify-between items-center transition-all duration-300">

            <button id="toggleButton" onclick="toggleNav()" class="absolute top-6 right-8 w-7 h-7">
                <x-uni-left-arrow-from-left-o id="arrowIcon" class="transition-transform duration-300" />
            </button>

            <div class="flex flex-col items-center justify-center w-full gap-8 px-[2px] mt-16 font-semibold h-fit">

                <a href="/dashboard" :active="request()->is('dashboard')" class="w-full flex justify-center"
                    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('dashboard.svg') }}" alt="dashboard">
                    </span>
                    <span
                        class="nav-text {{ $active ? 'bg-[#FD7E14] text-white' : 'bg-white hover:bg-[#FD7E14] hover:text-white' }} flex items-center w-full px-3 py-1 rounded-lg h-fit gap-5 text-center">
                        <x-fas-less-than
                            class="{{ $active ? 'rotate-180 transition-transform duration-300 shirnk' : '' }} w-5 h-5 " />
                        Dashboard
                    </span>
                </a>

                <a href="/medicine"
                    :active="request()->is('medicine') || request()->is('*addmedicine') || request()->is('medicine/deduct/*')"
                    class="w-full flex justify-center" aria-current="{{ $active ? 'page' : 'false' }}"
                    {{ $attributes }}>
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('medicine.svg') }}" alt="medicine" class="">
                    </span>
                    <span
                        class="nav-text {{ $active ? 'bg-[#FD7E14] text-white' : 'bg-white hover:bg-[#FD7E14] hover:text-white' }} flex items-center w-full px-3 py-1 rounded-lg h-fit gap-5 text-center">
                        <x-fas-less-than
                            class="{{ $active ? 'rotate-180 transition-transform duration-300 shirnk' : '' }} w-5 h-5 " />
                        Medicine
                    </span>
                </a>

                <a href="/equipments" :active="request()->is('equipments')" class="w-full flex justify-center"
                    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('equipment.svg') }}" alt="equipment">
                    </span>
                    <span
                        class="nav-text {{ $active ? 'bg-[#FD7E14] text-white' : 'bg-white hover:bg-[#FD7E14] hover:text-white' }} flex items-center w-full px-3 py-1 rounded-lg h-fit gap-5 text-center">
                        <x-fas-less-than
                            class="{{ $active ? 'rotate-180 transition-transform duration-300 shirnk' : '' }} w-5 h-5 " />
                        Equipments
                    </span>
                </a>
                @auth
                @if(auth()->user()->type === 'admin')
                <a href="/account" :active="request()->is('account') || request()->is('account/register')"
                    class="w-full flex justify-center" aria-current="{{ $active ? 'page' : 'false' }}"
                    {{ $attributes }}>
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('account.svg') }}" alt="account">
                    </span>
                    <span
                        class="nav-text {{ $active ? 'bg-[#FD7E14] text-white' : 'bg-white hover:bg-[#FD7E14] hover:text-white' }} flex items-center w-full px-3 py-1 rounded-lg h-fit gap-5 text-center">
                        <x-fas-less-than
                            class="{{ $active ? 'rotate-180 transition-transform duration-300 shirnk' : '' }} w-5 h-5 " />
                        Accounts
                    </span>
                </a>

                @endif
                @endauth

            </div>

            <form class="w-full" method="POST" action="/logout">
                @csrf
                @method("POST")
                <button class="w-full flex justify-center " type="submit">
                    <span class="flex-none nav-icon w-10 h-10 hover:scale-110">
                        <img src="{{ asset('logout.svg') }}" alt="logout">
                    </span>
                    <span
                        class="nav-text text-[#FD7E14] border-2 border-[#FD7E14] rounded-lg py-2 hover:bg-[#FD7E14] hover:text-white font-bold">
                        Log Out
                    </span>
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

    // chart 1

    var xValues = ["0", "1", "2", "3", "4", "5"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = ["red", "red", "red", "red", "red"];

    new Chart("myChart1", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: ""
            }
        }
    });

    // chart 2

    window.onload = function() {

        var chart = new CanvasJS.Chart("myChart2", {
            animationEnabled: true,
            title: {
                text: ""
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [{
                        y: 79.45,
                        label: "Condom"
                    },
                    {
                        y: 7.31,
                        label: "Dildo"
                    },
                    {
                        y: 7.06,
                        label: "Vibrator"
                    },
                    {
                        y: 4.91,
                        label: "Anal toys"
                    },
                    {
                        y: 1.26,
                        label: "Harnesses"
                    }
                ]
            }]
        });
        chart.render();

    }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>