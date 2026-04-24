@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto mt-10">

    <!-- HEADER + FILTER ICON -->
    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">Rekomendasi Cat</h2>

        <!-- FILTER ICON -->
        <div class="relative">
            <button onclick="toggleFilter()" 
                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                ⚙️ Filter
            </button>

            <!-- DROPDOWN FILTER -->
            <form method="GET" id="filterBox"
                class="absolute right-0 mt-2 bg-white p-4 rounded-xl shadow-lg hidden w-64 z-50">

                <!-- TIPE -->
                <label class="text-sm text-gray-500">Tipe</label>
                <select name="paint_type_id" onchange="this.form.submit()"
                    class="w-full border px-3 py-2 rounded-lg mb-3">
                    <option value="">Semua</option>
                    <option value="1" {{ request('paint_type_id') == 1 ? 'selected' : '' }}>🧱 Tembok</option>
                    <option value="2" {{ request('paint_type_id') == 2 ? 'selected' : '' }}>🪵 Kayu</option>
                    <option value="3" {{ request('paint_type_id') == 3 ? 'selected' : '' }}>🔩 Besi</option>
                </select>

                <!-- JENIS -->
                <label class="text-sm text-gray-500">Jenis</label>
                <select name="jenis" onchange="this.form.submit()"
                    class="w-full border px-3 py-2 rounded-lg">
                    <option value="">Semua</option>
                    <option value="interior" {{ request('jenis') == 'interior' ? 'selected' : '' }}>🛋️ Interior</option>
                    <option value="eksterior" {{ request('jenis') == 'eksterior' ? 'selected' : '' }}>🌧️ Eksterior</option>
                </select>

            </form>
        </div>

    </div>

    <!-- FILTER AKTIF -->
    @if(request('paint_type_id') || request('jenis'))
    <div class="flex gap-2 mb-6 flex-wrap">

        @if(request('paint_type_id'))
            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm">
                🎨 
                @if(request('paint_type_id') == 1) Tembok
                @elseif(request('paint_type_id') == 2) Kayu
                @elseif(request('paint_type_id') == 3) Besi
                @endif
            </span>
        @endif

        @if(request('jenis'))
            <span class="bg-green-100 text-green-600 px-3 py-1 rounded text-sm">
                🏠 {{ ucfirst(request('jenis')) }}
            </span>
        @endif

        <a href="{{ route('rekomendasi') }}" 
           class="text-red-500 text-sm">
           ❌ Reset
        </a>

    </div>
    @endif

    <!-- HASIL -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

@forelse($paints as $p)
<div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">

    <!-- BADGE -->
    <div class="flex gap-2 mb-2 text-xs flex-wrap">

        @if($p->terjual >= 100)
            <span class="bg-green-500 text-white px-2 py-1 rounded">
                🏆 Terlaris
            </span>
        @endif

        @if($p->kualitas == 'premium')
            <span class="bg-purple-500 text-white px-2 py-1 rounded">
                💎 Premium
            </span> 
        @else
            <span class="bg-blue-400 text-white px-2 py-1 rounded">
                ⭐ Standar
            </span>
        @endif

        @if($p->harga < 80000 && $p->kualitas == 'premium')
            <span class="bg-yellow-400 text-black px-2 py-1 rounded">
                💰 Best Value
            </span>
        @endif

    </div>

    <!-- NAMA -->
    <h3 class="text-lg font-semibold">{{ $p->nama_cat }}</h3>

    <!-- INFO -->
    <p class="text-sm text-gray-500">
        {{ $p->type->name ?? '-' }} • {{ ucfirst($p->jenis) }}
    </p>

    <!-- HARGA -->
    <p class="mt-2 text-blue-600 font-bold text-lg">
        Rp {{ number_format($p->harga) }}
    </p>

    <!-- TERJUAL -->
    <p class="text-sm text-gray-400">
        🔥 {{ $p->terjual }} terjual
    </p>

    <!-- SKOR -->
    <p class="text-xs text-gray-400">
        ⭐ Skor: {{ number_format($p->score,1) }}
    </p>

</div>
@empty
    <p class="text-gray-500">Tidak ada rekomendasi</p>
@endforelse

</div>

</div>

<!-- SCRIPT -->
<script>
function toggleFilter() {
    const box = document.getElementById('filterBox');
    box.classList.toggle('hidden');
}
</script>

@endsection