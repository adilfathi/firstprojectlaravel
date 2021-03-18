@extends('layouts.main')

@section('judul', 'Tambah Data Karyawan')

@section('container')
<div class="max-w-3xl mx-auto mt-3 sm:px-6 lg:px-8">
    <form method="post" action="/pegawai">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}">
            @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kode_divisi" class="form-label">Divisi / Bagian</label>
            <select name="kode_divisi" class="form-control @error('alamat') is-invalid @enderror" required oninvalid="this.setCustomValidity('Harap Pilih Divisi!!')" oninput="this.setCustomValidity('')">
                <option value="">--Pilih Divisi--</option>
                @foreach ($divisi as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_divisi }}</option>
                @endforeach
            </select>
            @error('kode_divisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="notelp" class="form-label">No.Telepon</label>
            <input type="text" class="form-control @error('notelp') is-invalid @enderror" id="notelp" name="notelp" placeholder="Masukkan No.Telepon" value="{{ old('notelp') }}">
            @error('notelp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            Tambah Data!
        </button>
    </form>
</div>
@endsection
