@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Edit Supplier</h2>

    <form method="POST" action="{{ route('suppliers.update',$supplier->id) }}">
    @csrf
    @method('PUT')

    <input name="nama_supplier" value="{{ $supplier->nama_supplier }}" class="w-full border p-2 mb-3">
    <input name="alamat" value="{{ $supplier->alamat }}" class="w-full border p-2 mb-3">
    <input name="telepon" value="{{ $supplier->telepon }}" class="w-full border p-2 mb-3">

    <button class="bg-green-500 text-white px-4 py-2 rounded">
        Update
    </button>

    </form>

</div>

@endsection