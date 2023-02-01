<?php

namespace App\Http\Controllers;

use App\PosisiKaryawan;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    
    public function index(){

        return view('master_data.index');
    }
    public function posisiKaryawan(){


        $posisi = PosisiKaryawan::all();

        return view('master_data.posisi_karyawan', compact('posisi'))->with('i');
    }

    public function addPosisiKaryawan(Request $request){


        $validatedData = $request->validate([
            'nama_posisi' => 'required'
        ]);

        $posisi = new PosisiKaryawan();

        $posisi->nama_posisi = $request->nama_posisi;
        $posisi->status = 1;

        $posisi->save();

        if($posisi){

            return redirect('master-posisi-karyawan')->with('success','Data berhasil di input');
        }else{
            return redirect('master-posisi-karyawan')->with('danger','Data gagal di input');

        }

    }

    public function changeStatusPosisi($id){


        $posisi = PosisiKaryawan::find($id);

        $status = $posisi->status == 1 ? 0 : 1; 

        $posisi->status = $status;
        
        $posisi->save();
   
             if($posisi){

            return redirect('master-posisi-karyawan')->with('success','Status berhasil diganti');
        }else{
            return redirect('master-posisi-karyawan')->with('danger','Status gagal diganti');

        }

    }

    public function editPosisi(Request $request){

        $posisi = PosisiKaryawan::find($request->id_posisi);

        $posisi->nama_posisi = $request->nama_posisi;
        $posisi->updated_at =  date('Y-m-d H:i:s');;
        $posisi->save();
        if($posisi){

            return redirect('master-posisi-karyawan')->with('success','Data berhasil diubah');
        }else{
            return redirect('master-posisi-karyawan')->with('danger','Data gagal diubah');

        }
    }
}
