@extends('layouts.main')

@section('judul', 'List Data Divisi')

@section('container')
    <div class="max-w-3xl ml-10 mt-10 sm:px-6 lg:px-8">
        <a href="{{ ('divisi/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            Tambah Divisi
        </a>
    </div>
    @if (session('status'))
        <div class="max-w-3xl ml-10 mt-3 sm:px-6 lg:px-8">
            <div id="status" class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="py-3">
        <div class="max-w-3xl mt-3 ml-10 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <table class="min-w-full divide-y divide-gray-200 shadow-lg flex-col">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        No
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nama
                        </th>
                        <th scope="col" class= "px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($divisi as $data)
                        <tr>
                            <td class="px-4 py-4 text-center whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $loop -> iteration}}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $data -> nama_divisi }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="/divisi/{{ $data -> id}}" class="px-3 inline-flex text-s leading-5 font-semibold rounded-full bg-green-100 text-green-700 hover:text-green-500">
                                    Detail
                                </a>
                            </td>
                        </tr>

                    @endforeach

                <!-- More items... -->
                </tbody>
            </table>
            {{-- <div class="flex flex-col">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
