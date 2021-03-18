@extends('layouts.main')

@section('judul', 'Tambah Data Divisi')

@section('container')
@section('container')
<div class="max-w-3xl mx-auto mt-3 sm:px-6 lg:px-8">
    <form method="post" action="{{ ('/divisi') }}">
        @csrf
        <div class="mb-3">
            <label for="nama_divisi" class="form-label">Nama Divisi</label>
            <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" id="nama_divisi" name="nama_divisi" placeholder="Masukkan Nama Divisi" value="{{ old('nama_divisi') }}">
            @error('nama_divisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_divisi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi_divisi') is-invalid @enderror" id="deskripsi_divisi" name="deskripsi_divisi" placeholder="Isi Deskripsi" value="{{ old('deskripsi_devisi') }}">
            @error('deskripsi_divisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            Tambah Data!
        </button>
    </form>
</div>
@endsection
