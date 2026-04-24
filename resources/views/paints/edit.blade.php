@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Edit Produk Cat</h2>
        <p class="text-gray-400 text-sm">Perbarui data produk</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <form method="POST" action="{{ route('paints.update', $paint->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">

            <div class="col-span-2">
                <label class="text-sm">Nama Cat</label>
                <input name="nama_cat" value="{{ $paint->nama_cat }}" 
                class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="text-sm">Tipe Cat</label>
                <select name="paint_type_id" class="w-full border rounded-lg p-3">
                    <option value="1" {{ $paint->paint_type_id == 1 ? 'selected' : '' }}>Tembok</option>
                    <option value="2" {{ $paint->paint_type_id == 2 ? 'selected' : '' }}>Kayu</option>
                    <option value="3" {{ $paint->paint_type_id == 3 ? 'selected' : '' }}>Besi</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Jenis</label>
                <select name="jenis" class="w-full border rounded-lg p-3">
                    <option value="interior" {{ $paint->jenis == 'interior' ? 'selected' : '' }}>Interior</option>
                    <option value="eksterior" {{ $paint->jenis == 'eksterior' ? 'selected' : '' }}>Eksterior</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Warna</label>
                <input name="warna" value="{{ $paint->warna }}" 
                class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="text-sm">Harga</label>
                <input name="harga" value="{{ $paint->harga }}" 
                class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="text-sm">Terjual</label>
                <input name="terjual" value="{{ $paint->terjual }}" 
                class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="text-sm">Kualitas</label>
                <select name="kualitas" class="w-full border rounded-lg p-3">
                    <option value="premium" {{ $paint->kualitas == 'premium' ? 'selected' : '' }}>Premium</option>
                    <option value="standar" {{ $paint->kualitas == 'standar' ? 'selected' : '' }}>Standar</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Ukuran</label>
                <input name="ukuran" value="{{ $paint->ukuran }}" 
                class="w-full border rounded-lg p-3">
            </div>

            <div class="col-span-2">
                <label class="text-sm">Deskripsi</label>
                <textarea name="deskripsi" 
                class="w-full border rounded-lg p-3">{{ $paint->deskripsi }}</textarea>
            </div>

        </div>

        <div class="flex gap-3 mt-6">

            <a href="/paints" class="flex-1 text-center bg-gray-200 py-3 rounded-lg">
                Kembali
            </a>

            <button class="flex-1 bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg">
                Update
            </button>

        </div>

        </form>

    </div>

</div>

@endsection