<x-app-layout title="Result">
    <x-slot name="header">
        <h2 class="font-semibold text-2xl  leading-tight">
            {{ __('Hasil Voting') }}
        </h2>
    </x-slot>

    <div class="text-indigo-100 min-h-screen" style="background: linear-gradient(to bottom, #0D1B2A, #1B263B, #2C3E50, #3A506B,  #0D1B2A); min-height: 100vh;">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-transparent overflow-hidden sm:rounded-xl">
                    <div class="p-8 text-white">
                        <!-- Section Title -->
                        <h3 class="text-3xl font-extrabold mb-4">
                            {{ __('Hasil Perolehan Suara') }}
                        </h3>
                        <p class="text-base mb-6">
                            {{ __('Terima kasih telah mengunjungi sistem voting online kami! Platform ini dirancang untuk memudahkan partisipasi Anda dalam pemilihan dengan transparansi dan kenyamanan.') }}
                        </p>

                        <!-- Pie Chart Section -->
                        <div class="mt-10">
                            <h4 class="text-xl font-semibold mb-6">
                                {{ __('Diagram Lingkaran Hasil Voting') }}
                            </h4>
                            <div class="size-1/2 mx-auto">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>

                        <!-- Total Votes Section -->
                        <div class="mb-6 p-4 rounded-lg">
                            <h4 class="text-xl font-semibold">
                                {{ __('Total Suara Keseluruhan: ') }}
                                <span class="font-bold">{{ $totalVotes }}</span>
                            </h4>
                        </div>

                        <!-- Voting Results Section -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-8">
                            @foreach ($votings as $voting)
                                <div class="bg-gray-800 rounded-lg p-6 shadow-xl transform transition duration-300 ease-in-out hover:scale-105 hover:bg-gray-700 border-l-4 border-blue-600 hover:border-blue-800">
                                    <h4 class="text-lg font-semibold mb-2">
                                        <span class="text-indigo-600">{{ $voting->candidate }}</span>
                                    </h4>
                                    <p class="text-xl font-bold">
                                        {{ __('Jumlah Suara: ') . $voting->total }}
                                    </p>
                                    <div class="mt-4 h-2 bg-gray-300 rounded-full relative">
                                        <div 
                                            class="bg-gradient-to-r from-indigo-500 to-indigo-700 h-2 rounded-full"
                                            style="width: {{ ($voting->total / $totalVotes) * 100 }}%;"></div>
                                        <span class="absolute right-0 top-0 mt-1 text-xs font-semibold">
                                            {{ round(($voting->total / $totalVotes) * 100, 1) }}%
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('pieChart').getContext('2d');

            const data = {
                labels: @json($votings->pluck('candidate')),
                datasets: [{
                    label: 'Voting Results',
                    data: @json($votings->pluck('total')),
                    backgroundColor: [
                        '#4CAF50', '#FFC107', '#03A9F4', '#E91E63', '#FF5722',
                        '#9C27B0', '#3F51B5', '#00BCD4', '#8BC34A', '#FF9800'
                    ],
                    borderColor: '#FFFFFF',
                    borderWidth: 2,
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        datalabels: {
                            color: '#fff', // Warna teks label
                            font: {
                                weight: 'bold',
                            },
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                return `${label}: ${value}`;
                            }
                        }
                    },
                },
                plugins: [ChartDataLabels] // Aktifkan plugin datalabels
            };

            new Chart(ctx, config);
        });
    </script>
</x-app-layout>
