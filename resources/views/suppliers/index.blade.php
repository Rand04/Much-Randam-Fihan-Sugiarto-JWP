@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto mt-10">

    <div class="flex justify-between mb-6">
        <h2 class="text-2xl font-bold">Data Supplier</h2>

        <a href="{{ route('suppliers.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded">
           + Tambah
        </a>
    </div>

    @forelse($suppliers as $s)

<div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition mb-4">

    <!-- NAMA -->
    <h3 class="text-lg font-semibold text-gray-800">
        {{ $s->nama_supplier }}
    </h3>

    <!-- INFO -->
    <p class="text-sm text-gray-500">
        {{ $s->alamat }}
    </p>

    <p class="text-sm text-gray-400">
        {{ $s->telepon }}
    </p>

    <!-- ACTION -->
    <div class="mt-4 flex gap-2">

        <!-- EDIT -->
        <a href="{{ route('suppliers.edit', $s->id) }}" 
           class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 px-3 py-2 rounded-lg text-sm font-medium">
           Edit
        </a>

        <!-- HAPUS -->
        <form action="{{ route('suppliers.destroy', $s->id) }}" method="POST" class="flex-1">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('Yakin hapus data ini?')"
                class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-medium">
                Hapus
            </button>
        </form>

    </div>

</div>

@empty
    <p class="text-gray-500 text-center mt-10">
        Belum ada data supplier
    </p>
@endforelse
</div>

@endsection

