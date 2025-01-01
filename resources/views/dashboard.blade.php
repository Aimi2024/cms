<x-layout>
    <div class="w-full flex flex-col items-center gap-10 h-dvh px-4 lg:px-32 py-12 overflow-x-hidden">
        <div class="flex flex-col lg:flex-row lg:gap-8">
            <!-- Bar Chart -->
            <div class="h-[40vh] w-full min-h-[40vh] min-w-[40vw]">
                <canvas id="barChart" class="bg-white"></canvas>
            </div>

            <!-- Pie Chart -->
            <div class="h-[40vh] w-full min-h-[40vh] min-w-[40vw]">
                <canvas id="pieChart" class="bg-white"></canvas>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
// Pass data to JavaScript for the charts
const medicineLabels = @json($medicineLabels);
const medicineData = @json($medicineData);
const equipmentLabels = @json($equipmentLabels);
const equipmentData = @json($equipmentData);

const expiredData = [@json($expiredMedicinesCount), @json($expiredEquipmentCount)];
const expiredLabels = ['Expired Medicines', 'Expired Equipment'];

// Bar Chart Configuration
const ctx1 = document.getElementById('barChart').getContext('2d');
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: [...medicineLabels, ...equipmentLabels],
        datasets: [{
                label: 'Medicine Stock',
                data: medicineData,
                backgroundColor: 'rgba(75, 192, 192, 0.7)'
            },
            {
                label: 'Equipment Stock',
                data: equipmentData,
                backgroundColor: 'rgba(255, 159, 64, 0.7)'
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Stock Levels of Medicines and Equipment',
                font: {
                    size: 18
                }
            },
            legend: {
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Pie Chart Configuration
const ctx2 = document.getElementById('pieChart').getContext('2d');
new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: expiredLabels,
        datasets: [{
            data: expiredData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)', // Red for medicines
                'rgba(54, 162, 235, 0.7)' // Blue for equipment
            ],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Expired Items Overview',
                font: {
                    size: 18
                }
            },
            datalabels: {
                display: true,
                color: 'white',
                font: {
                    weight: 'bold',
                    size: 14
                },
                formatter: (value) => {
                    return value > 0 ? value : ''; // Show only non-zero values
                }
            }
        },
        legend: {
            display: true,
            position: 'bottom'
        }
    },
    plugins: [ChartDataLabels]
});
</script>