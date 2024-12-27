<x-layout>

    <div class="w-full flex flex-col gap-10 h-dvh px-32 py-12">

        <div class="flex flex-row gap-8">

            <div class="border p-2 bg-white">
                <canvas id="myChart1" class="h-80"></canvas>
            </div>

            <div id="myChart2" class="border grow"></div>

        </div>

        <div class="flex flex-row justify-between w-full">

            <div
                class="border flex flex-col items-center bg-white text-red-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap">
                <h1 class="text-4xl">2</h1>
                <p class="text-sm">LOW STOCK</p>
            </div>

            <div
                class="border flex flex-col items-center bg-white text-green-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap">
                <h1 class="text-4xl">2</h1>
                <p class="text-sm">NEW STOCKS</p>
            </div>

            <div
                class="border flex flex-col items-center bg-white text-black font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap">
                <h1 class="text-4xl">2</h1>
                <p class="text-sm">EXPIRED</p>
            </div>

        </div>

    </div>

</x-layout>