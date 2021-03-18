@extends('layouts/main')
{{-- Layout Detail Data Pegawai --}}
@section('judul', 'Detail Data Pegawai')

@section('container')

<div class="card mt-4 max-w-2xl mx-auto sm:px-6 lg:px-8">
    <div class="card-body font-sans md:font-serif">
        <p class="card-title text-lg">Nama : {{ $pegawai -> name }}</p>
        <p class="card-text text-lg">Nip : {{ $pegawai -> nip }}</p>
        <p class="card-text">Alamat : {{ $pegawai -> alamat }}</p>
        <p class="card-text">No Telepon : {{ $pegawai -> notelp }}</p>
        <a href="{{ $pegawai -> id }}/edit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-full mt-3 mr-1">
            Ubah Data!
        </a>
        <form action="{{ $pegawai -> id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                Hapus Data
            </button>
        </form>

        <a href="{{'/pegawai')}}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-full">Kembali</a>
    </div>
</div>
@endsection
