<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller{

    public function index(){
        // mengambil data dari table pegawai
        $pegawai = DB::table('karyawans')->get();

        // mengirim data pegawai ke view index
        return view('index', ['karyawans' => $pegawai]);
    }

     public function store(Request  $request){
        DB::table('karyawans')->insert([
            'name' => $request->nama,
            'job' => $request->jabatan,
            'waktu' => $request->waktu,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }

    public function edit($id){
        
        $pegawai = DB::table('karyawans')->where('id', $id)->get();
        return view('edit',['pegawai' => $pegawai]);
    }

    public function update( Request $request){
        DB::table('karyawans')->where('id',$request->id)->update([
            'name' => $request->nama,
            'job' => $request->jabatan,
            'waktu' => $request->waktu
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }

    public function hapus($id){
        DB::table('pegawai')->where('pegawai_id', $id)-> delete();
        return redirect('/pegawai');
    }
    //
}
