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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // Chart 1 - Bar Chart for Medicine and Equipment Stock Levels
        const xValues = @json(array_merge($medicineLabels->toArray(), $equipmentLabels->toArray()));
        const yValues = @json(array_merge($medicineData->toArray(), $equipmentData->toArray()));
        const barColors = ["#ff6384", "#36a2eb", "#cc65fe", "#ffce56", "#4bc0c0", "#f87979", "#f1c40f", "#8e44ad", "#3498db", "#2ecc71"];

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
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Medicine and Equipment Stock Levels',
                        font: {
                            size: 18
                        }
                    },
                    datalabels: {
                        anchor: 'center',  // Position inside the bar
                        align: 'center',   // Center the value horizontally
                        color: '#fff',     // White text for contrast
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value) => {
                            return value;  // Display the raw value
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Stock Quantity",
                            font: {
                                size: 14
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Items",
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Chart 2 - Doughnut Chart for Expired Items
        const doughnutLabels = ["Expired Medicines", "Expired Equipment"];
        const doughnutData = [@json($expiredMedicinesCount), @json($expiredEquipmentCount)];
        const barColors1 = ["#b91d47", "#00aba9"];

        new Chart("myChart2", {
            type: "doughnut",
            data: {
                labels: doughnutLabels,
                datasets: [{
                    backgroundColor: barColors1,
                    data: doughnutData
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true
                    },
                    title: {
                        display: true,
                        text: 'Expired Medicine and Equipment',
                        font: {
                            size: 18
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        formatter: (value) => {
                            let total = doughnutData.reduce((a, b) => a + b, 0);
                            if (total === 0) return "0%";
                            let percentage = ((value / total) * 100).toFixed(1);
                            return `${percentage}%`;
                        },
                        font: {
                            weight: 'bold',
                            size: 14
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>






</x-layout>
