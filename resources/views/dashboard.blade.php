@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
        <p class="text-gray-400 text-sm">
            Ringkasan data penjualan produk cat
        </p>
    </div>

    <!-- STATS + INSIGHT -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <!-- Total Produk -->
        <div class="bg-white p-5 rounded-2xl shadow text-center hover:shadow-lg transition">
            <p class="text-gray-400 text-sm">Total Produk</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">
                {{ $total }}
            </h2>
        </div>

        <!-- Produk Premium -->
        <div class="bg-white p-5 rounded-2xl shadow text-center hover:shadow-lg transition">
            <p class="text-gray-400 text-sm">Produk Premium</p>
            <h2 class="text-3xl font-bold text-purple-600 mt-2">
                {{ $premiumCount }}
            </h2>
        </div>

        <!-- Rata-rata -->
        <div class="bg-white p-5 rounded-2xl shadow text-center hover:shadow-lg transition">
            <p class="text-gray-400 text-sm">Rata-rata</p>
            <h2 class="text-3xl font-bold text-pink-500 mt-2">
                {{ number_format($rata,0) }}
            </h2>
        </div>

        <!-- Produk Termurah -->
        <div class="bg-white p-5 rounded-2xl shadow text-center hover:shadow-lg transition">
            <p class="text-gray-400 text-sm">Termurah</p>
            <h2 class="text-sm font-bold mt-2">
                {{ $termurah->nama_cat ?? '-' }}
            </h2>
            <p class="text-blue-600 text-sm">
                Rp {{ number_format($termurah->harga ?? 0) }}
            </p>
        </div>

    </div>

    <!-- HIGHLIGHT -->
    <div class="bg-white p-6 rounded-2xl shadow mb-8">

        <h3 class="text-lg font-bold mb-4 text-gray-700">
            🔥 Produk Terlaris
        </h3>

        @if($terlaris)
        <div class="flex justify-between items-center">

            <div>
                <h4 class="text-xl font-semibold">
                    {{ $terlaris->nama_cat }}
                </h4>

                <p class="text-sm text-gray-500">
                    {{ $terlaris->type->name ?? '-' }} • {{ ucfirst($terlaris->jenis) }}
                </p>

                <p class="text-blue-600 font-bold mt-2">
                    Rp {{ number_format($terlaris->harga) }}
                </p>
            </div>

            <div class="text-right">
                <p class="text-green-600 font-bold text-lg">
                    {{ $terlaris->terjual }} terjual
                </p>

                <span class="bg-green-500 text-white text-xs px-3 py-1 rounded">
                    Terlaris
                </span>
            </div>

        </div>
        @else
            <p class="text-gray-400">Belum ada data</p>
        @endif

    </div>

    <!-- GRAFIK -->
    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg font-bold mb-6">Grafik Penjualan</h3>
        <canvas id="chartPenjualan" height="100"></canvas>
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const labels = JSON.parse('@json($labels)');
    const data = JSON.parse('@json($data)');

    const colors = [
        '#3B82F6','#10B981','#F59E0B','#EF4444','#8B5CF6','#14B8A6'
    ];

    const ctx = document.getElementById('chartPenjualan').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Terjual',
                data: data,
                backgroundColor: colors,
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            animation: {
                duration: 1200
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

});
</script>

@endsection