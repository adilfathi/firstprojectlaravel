@extends('layouts.main')

@section('judul', 'Ubah Data Pegawai')

@section('container')
<div class="max-w-3xl mx-auto mt-3 sm:px-6 lg:px-8">
    <form method="post" action="/pegawai/{{ $karyawans -> id}}">
        @method('patch')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama" value="{{ $karyawans -> name }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ $karyawans -> nip }}">
            @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ $karyawans -> alamat }}">
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="notelp" class="form-label">No.Telepon</label>
            <input type="text" class="form-control @error('notelp') is-invalid @enderror" id="notelp" name="notelp" placeholder="Masukkan No.Telepon" value="{{ $karyawans -> notelp }}">
            @error('notelp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            Ubah Data!
        </button>
    </form>
</div>
@endsection
