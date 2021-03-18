<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisi = Divisi::all();
        return view('divisi.index', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_divisi' => 'required',
            'deskripsi_divisi' => 'required'

        ],
        [
            'nama_divisi.required' => 'Harap Diisi, Tabel Nama Masih Kosong!',
            'deskripsi_divisi.required' => 'Harap Diisi, Tabel Deskripsi Masih Kosong!'
        ]);
        Divisi::create($request -> all());
        return redirect('/divisi')->with('status', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        return view('divisi.show', compact('divisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        return view('divisi.edit', compact('divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $request -> validate([
            'nama_divisi' => 'required',
            'deskripsi_divisi' => 'required'

        ],
        [
            'nama_divisi.required' => 'Harap Diisi, Tabel Nama Masih Kosong!',
            'deskripsi_divisi.required' => 'Harap Diisi, Tabel Deskripsi Masih Kosong!'
        ]);

        Divisi::create($request -> all());

        Divisi::where ('id', $divisi -> id)
                ->update([
                    'nama_divisi' => $request -> nama_divisi,
                    'deskripsi_divisi' => $request -> deskripsi_divisi,
                ]);
        return redirect('/divisi')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        Divisi::destroy($divisi -> id);
        return redirect('/divisi')->with('status', 'Data Berhasil Dihapus!');
    }
}
