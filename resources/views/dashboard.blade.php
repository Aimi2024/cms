<x-layout>

    <div class="w-full flex flex-col items-center gap-10 h-dvh px-4 lg:px-32 py-12 overflow-x-hidden">

        <div class="flex flex-col lg:flex-row lg:gap-8">

            <div class="h-[40vh] w-[40vw] min-h-[40vh] min-w-[40vw]">
                <canvas id="myChart1" class="bg-white"></canvas>
            </div>

            <div id="myChart2" class="border h-[40vh] w-[40vw]"></div>

        </div>

        <div class="flex flex-row justify-between w-full gap-5">

            <div
                class="border flex flex-col items-center bg-white text-red-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $medicineCount }}</h1>
                <p class="text-sm">LOW STOCK</p>
            </div>

            <div
                class="border flex flex-col items-center bg-white text-green-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $newMedicineCount }}</h1>
                <p class="text-sm">NEW STOCKS</p>
            </div>

            <div
                class="border flex flex-col items-center bg-white text-black font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $expiredMedicine }}</h1>
                <p class="text-sm">EXPIRED</p>
            </div>

        </div>

    </div>

</x-layout>