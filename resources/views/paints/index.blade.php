@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Data Produk Cat</h2>
            <p class="text-gray-400 text-sm">Kelola semua produk cat</p>
        </div>

        <a href="{{ route('paints.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg shadow transition">
           + Tambah Produk
        </a>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @forelse($paints as $p)
    
    <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">

        <!-- BADGE -->
        <div class="flex gap-2 mb-2 text-xs">
            @if($p->terjual >= 100)
                <span class="bg-green-500 text-white px-2 py-1 rounded">Terlaris</span>
            @endif

            @if($p->kualitas == 'premium')
                <span class="bg-purple-500 text-white px-2 py-1 rounded">Premium</span>
            @else
                <span class="bg-gray-400 text-white px-2 py-1 rounded">Standar</span>
            @endif
        </div>

        <!-- NAMA -->
        <h3 class="text-lg font-semibold text-gray-800">
            {{ $p->nama_cat }}
        </h3>

        <!-- INFO -->
        <p class="text-sm text-gray-500">
            {{ $p->type->name ?? '-' }} • {{ ucfirst($p->jenis) }}
        </p>

        <!-- HARGA -->
        <p class="mt-3 text-blue-600 font-bold text-lg">
            Rp {{ number_format($p->harga) }}
        </p>

        <!-- TERJUAL -->
        <p class="text-sm text-gray-400">
            {{ $p->terjual }} terjual
        </p>

        <!-- ACTION -->
        <div class="mt-4 flex gap-2">

            <!-- EDIT -->
            <a href="{{ route('paints.edit', $p->id) }}" 
               class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 px-3 py-2 rounded-lg text-sm font-medium">
               Edit
            </a>

            <!-- DELETE BUTTON (OPEN MODAL) -->
            <button type="button" onclick="openModal('{{ $p->id }}')"
                class="flex-1 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-medium">
                Hapus
            </button>

        </div>  

    </div>

    @empty
        <p class="text-gray-500">Belum ada data</p>
    @endforelse

    </div>

</div>

@endsection


<!-- MODAL DELETE -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">

    <div class="bg-white p-6 rounded-xl shadow-xl w-80 text-center transform scale-95 transition">

        <h2 class="text-lg font-bold mb-2 text-gray-800">
            Konfirmasi Hapus
        </h2>

        <p class="text-gray-500 text-sm mb-4">
            Yakin mau menghapus data ini?
        </p>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex gap-3">

                <button type="button" onclick="closeModal()"
                    class="flex-1 bg-gray-200 py-2 rounded hover:bg-gray-300">
                    Batal
                </button>

                <button type="submit"
                    class="flex-1 bg-red-500 text-white py-2 rounded hover:bg-red-600">
                    Hapus
                </button>

            </div>
        </form>

    </div>

</div>


<!-- SCRIPT -->
<script>
function openModal(id) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');

    form.action = `/paints/${id}`;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>