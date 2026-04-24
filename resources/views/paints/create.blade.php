@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Tambah Produk Cat</h2>
        <p class="text-gray-400 text-sm">Masukkan data produk baru</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <!-- ERROR -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-600 p-3 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('paints.store') }}">
        @csrf

        <div class="grid grid-cols-2 gap-4">

            <div class="col-span-2">
                <label class="text-sm">Nama Cat</label>
                <input name="nama_cat" 
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="text-sm">Tipe Cat</label>
                <select name="paint_type_id" 
                class="w-full border rounded-lg p-3">
                    <option value="">Pilih</option>
                    <option value="1">Tembok</option>
                    <option value="2">Kayu</option>
                    <option value="3">Besi</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Jenis</label>
                <select name="jenis" 
                class="w-full border rounded-lg p-3">
                    <option value="interior">Interior</option>
                    <option value="eksterior">Eksterior</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Warna</label>
                <input name="warna" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="text-sm">Harga</label>
                <input name="harga" type="number" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="text-sm">Terjual</label>
                <input name="terjual" type="number" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="text-sm">Kualitas</label>
                <select name="kualitas" class="w-full border rounded-lg p-3">
                    <option value="premium">Premium</option>
                    <option value="standar">Standar</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Ukuran</label>
                <input name="ukuran" class="w-full border rounded-lg p-3">
            </div>

            <div class="col-span-2">
                <label class="text-sm">Deskripsi</label>
                <textarea name="deskripsi" 
                class="w-full border rounded-lg p-3"></textarea>
            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex gap-3 mt-6">

            <a href="/paints" 
               class="flex-1 text-center bg-gray-200 py-3 rounded-lg">
               Kembali
            </a>

            <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg">
                Simpan
            </button>

        </div>

        </form>

    </div>

</div>

@endsection