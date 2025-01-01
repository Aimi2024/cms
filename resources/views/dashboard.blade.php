<x-layout>
    <div class="w-full flex flex-col items-center gap-10 h-dvh px-10 lg:px-32 py-12 overflow-x-hidden">

        <div class="w-full flex flex-col lg:flex-row justify-between whitespace-nowrap">
            <!-- Chart 1-->
            <div class="flex-1 h-80 w-full">
                <canvas id="myChart1"></canvas>
            </div>

            <!-- Chart 2-->
            <div class="flex-1 h-80 w-full">
                <canvas id="myChart2"></canvas>
            </div>
        </div>

        <div class="flex flex-row justify-between w-full gap-5">
            <!-- Low Stock Item -->
            <div
                class="border flex flex-col items-center bg-white text-red-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $lowStockItems }}</h1>
                <p class="text-sm">LOW STOCK</p>
            </div>

            <!-- New Stock Item -->
            <div
                class="border flex flex-col items-center bg-white text-green-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $newStock }}</h1>
                <p class="text-sm">NEW STOCKS</p>
            </div>

            <!-- Expired Item -->
            <div
                class="border flex flex-col items-center bg-white text-black font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $expiredItems }}</h1>
                <p class="text-sm">EXPIRED</p>
            </div>
        </div>
    </div>
</x-layout>