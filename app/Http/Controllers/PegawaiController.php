<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Karyawan;
use \App\Models\Divisi;

class PegawaiController extends Controller{

    public function index(){
        // mengambil data dari table pegawai
        // $pegawai = DB::table('karyawans')->get();

        // mengambil data dari table pegawai pake Eloquent
        // $pegawai = Karyawan::all();
        $pegawai = Karyawan::with('divisi')->latest()->paginate(10);
        // mengirim data pegawai ke view index
        return view('pegawai/index', compact('pegawai'));
    }

    public function create() {

        $divisi = Divisi::all();
        return view('pegawai.create', compact('divisi'));
    }

    // Detail Data Pegawai
    public function show(Karyawan $pegawai) {
        return view('pegawai.show', compact('pegawai'));
    }

    public function store(Request  $request){
        #Eloquent
        // Karyawan::create([
        //     'name' => $request -> nama,
        //     'job' => $request -> jabatan,
        //     'nip' => $request -> nip,
        //     'alamat' => $request -> alamat,
        //     'notelp' => $request -> notelp
        // ]);

        $request->validate([
            'name' => 'required|unique:karyawans,name',
            'nip' => 'required|size:9',
            'alamat' => 'required',
            'notelp' => 'required|min:9'
        ],
        [
            'name.required' => 'Tabel Nama Masih Kosong!',
            'name.unique' => 'Nama Sudah Terdaftar, Coba Lagi!',
            'nip.required' => 'Tabel NIP Masih Kosong!',
            'nip.size' => 'NIP Harus Berjumlah 9 digit!',
            'alamat.required' => 'Tabel Alamat Masih Kosong!',
            'notelp.required' => 'Tabel No.Telepon Masih Kosong!',
            'notelp.min' => 'No.Telepon minimal 9 digit!',
        ]

        );

        Karyawan::create($request->all());
        // // alihkan halaman ke halaman pegawai
        return redirect('/pegawai')->with('status', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Karyawan $pegawai){
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Karyawan $pegawai){
        //Update Method (Non-Eloquent)
        // DB::table('karyawans')->where('id',$request->id)->update([
        //     'name' => $request->nama,
        //     'job' => $request->jabatan,
        //     'waktu' => $request->waktu
        // ]);

        //Validation
        $request->validate([
            'name' => 'required',
            'nip' => 'required|size:9',
            'alamat' => 'required',
            'notelp' => 'required|min:9'
        ],
        [
            'name.required' => 'Tabel Nama Masih Kosong!',
            'nip.required' => 'Tabel NIP Masih Kosong!',
            'nip.size' => 'NIP Harus Berjumlah 9 digit!',
            'alamat.required' => 'Tabel Alamat Masih Kosong!',
            'notelp.required' => 'Tabel No.Telepon Masih Kosong!',
            'notelp.min' => 'No.Telepon minimal 9 digit!',
        ]

        );
        //Update Method (Eloquent)
        Karyawan::where('id', $pegawai -> id)
                ->update([
                    'name' => $request -> name,
                    'nip' => $request -> nip,
                    'alamat' => $request -> alamat,
                    'notelp' => $request -> notelp
                ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai')->with('status', 'Data Berhasil Diubah!');
    }

    public function hapus(Karyawan $pegawai){
        // DB::table('pegawai')->where('pegawai_id', $id)-> delete();
        // return redirect('/pegawai');
        Karyawan::destroy($pegawai -> id);
        return redirect('/pegawai')->with('status', 'Data Berhasil Dihapus!');
    }
}
