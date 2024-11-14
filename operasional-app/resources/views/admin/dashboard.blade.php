<x-admin-layouts>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-12 md:p-6">
        <div class="flex justify-between">
            <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Booking Overview</h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Booking in {{$allMounth}} months</p>
            </div>
        </div>
        <!-- Top Chart -->
        <div class="w-full mb-8">
            <canvas id="trov-chart" width="100%" height="30vh"></canvas>
        </div>
        <!-- Bottom Charts -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="w-full">
                <canvas id="myChart" width="100%" height="30vh"></canvas>
            </div>
            <div class="w-full">
                <canvas id="chartConsume" width="100%" height="30vh"></canvas>
            </div>
        </div>
    </div>



    <script>
        new Chart(document.getElementById("trov-chart"), {
            type: 'line',
            data: {
                labels: <?= $label2 ?>,
                datasets: [{
                    data: <?= $data2 ?>,
                    label: "Booking",
                    borderColor: "#3e95cd",
                    fill: false
                }],
            },
            options: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Booking Chart in Month'
                },
                layout: {
                    padding: {
                        top: 1
                    }
                },
            }
        });
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= $label ?>,
                datasets: [{
                    label: 'Data', // Set a generic label for the dataset
                    data: <?= $data ?>,
                    backgroundColor: <?= $color ?>,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                        labels: {
                            color: 'black' // Customize legend label color if needed
                        }
                    },
                    title: {
                        display: true,
                        text: 'Vehicle Type in mine' // Set the title of the chart here
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(document.getElementById("chartConsume"), {
            type: 'line',
            data: {
                labels: <?= $label2 ?>,
                datasets: [{
                    data: <?= $fuel ?>,
                    label: "average fuel consumption",
                    borderColor: "#3e95cd",
                    fill: false
                }, {
                    data: <?= $distance ?>,
                    label: "average distance vehicle",
                    borderColor: "#8e5ea2",
                    fill: false
                }],
            },
            options: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Booking Chart in Month'
                },
                layout: {
                    padding: {
                        top: 1
                    }
                },
            }
        });
    </script>
</x-admin-layouts>