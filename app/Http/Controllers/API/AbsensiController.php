<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request ->input('id');
        $limit = $request->input('limit',6);
        $name = $request->input('name');
        $types = $request->input('types');
        $name = $request->input('name');

        $name_from = $request->input('name_from');
        $name_to = $request->input('name_to');

        $job_from = $request->input('job_from');
        $job_to = $request->input('job_to');

        if ($id){
            $pegawai = Pegawai::find($id);

            if($pegawai){
                return ResponseFormatter::success(
                    $pegawai,
                    'data nama berhasil di panggil'
                );
            }
            else{
                return ResponseFormatter::error(
                    null,
                    'data pegawai tidak ada',
                    404
                );
            }          
        }
        $pegawai = Pegawai::query();
        if($name){
            $pegawai->where('name','like','%'.$name.'%');
        }
        if($types){
            $pegawai->where('name','like','%'.$types.'%');
        }
        if($name_from){ 
            $pegawai->where('name','like','>=',$name_from);
        }
        if($name_to){
            $pegawai->where('name','like','<=',$name_to);
        }
        if($job_from){
            $pegawai->where('name','like','>=',$job_from);
        }
        if($job_to){
            $pegawai->where('name','like','<=',$job_to);
        }

        return ResponseFormatter::success(
            $pegawai->paginate($limit),
            'data list pegawai berhasil diambil'
        );

    }
}
