<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{

    public function index(){
        $pegawai = DB::table('admins')->get();
        return view('index', ['admins' => $pegawai]);
    }

    public function store(Request  $request) {
        DB::table('admins')->insert([
            'name' => $request->nama,
            'password' => $request->password,
        ]);
        return redirect('/admin');
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
        return redirect('/pegawai');
    }
    public function hapus($id){
        DB::table('pegawai')->where('pegawai_id', $id)-> delete();
        return redirect('/pegawai');
    }
    //
}
