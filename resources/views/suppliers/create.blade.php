@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Tambah Supplier</h2>

    <form method="POST" action="{{ route('suppliers.store') }}">
    @csrf

    <input name="nama_supplier" placeholder="Nama Supplier" class="w-full border p-2 mb-3">
    <input name="alamat" placeholder="Alamat" class="w-full border p-2 mb-3">
    <input name="telepon" placeholder="Telepon" class="w-full border p-2 mb-3">

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Simpan
    </button>

    </form>

</div>

@endsection