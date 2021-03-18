@extends('layouts/main')
{{-- Layout Detail Data Pegawai --}}
@section('judul', 'Detail Data Divisi')

@section('container')
    <div class="card mt-4 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="card-body font-sans md:font-serif">
            <p class="card-title text-lg">Nama : {{ $divisi -> nama_divisi }}</p>
            <p class="card-title text-lg">Deskripsi : {{ $divisi -> deskripsi_divisi }}</p>
            <a href="{{ $divisi -> id }}/edit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-full mt-3 mr-1">
                Ubah Data!
            </a>
            <form action="{{ $divisi -> id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                    Hapus Data
                </button>
            </form>

            <a href="{{ ('/divisi') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-full">Kembali</a>
        </div>
    </div>
@endsection
