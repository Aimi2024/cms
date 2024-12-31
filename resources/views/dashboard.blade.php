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
            <div class="border flex flex-col items-center bg-white text-red-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $lowStockItems }}</h1>
                <p class="text-sm">LOW STOCK</p>
            </div>

            <!-- New Stock Item -->
            <div class="border flex flex-col items-center bg-white text-green-500 font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $newStock }}</h1>
                <p class="text-sm">NEW STOCKS</p>
            </div>

            <!-- Expired Item -->
            <div class="border flex flex-col items-center bg-white text-black font-extrabold justify-center w-32 h-32 overflow-hidden whitespace-nowrap hover:bg-gray-200">
                <h1 class="text-4xl">{{ $expiredItems }}</h1>
                <p class="text-sm">EXPIRED</p>
            </div>
        </div>
    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    // Ensure data is passed correctly
    console.log('Medicine Labels:', @json($medicineLabels));
    console.log('Medicine Data:', @json($medicineData));
    console.log('Equipment Labels:', @json($equipmentLabels));
    console.log('Equipment Data:', @json($equipmentData));
    console.log('Expired Labels:', @json($expiredLabels));
    console.log('Expired Data:', @json($expiredData));

    const medicineLabels = @json($medicineLabels);
    const medicineData = @json($medicineData);
    const equipmentLabels = @json($equipmentLabels);
    const equipmentData = @json($equipmentData);
    const expiredLabels = @json($expiredLabels);
    const expiredData = @json($expiredData);

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
            }]
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
                },
                datalabels: {
                    display: true,
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 12 // Adjusted font size
                    },
                    anchor: 'end',  // Position the label at the end of the bar
                    align: 'top',   // Align the label to the top of the bar
                    formatter: (value, context) => {
                        return context.chart.data.labels[context.dataIndex]; // Display the product name as the label
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // Pie Chart Configuration
    const ctx2 = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: expiredLabels,
            datasets: [{
                label: 'Expired Items',
                data: expiredData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)'
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
                        size: 12 // Adjusted font size
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
