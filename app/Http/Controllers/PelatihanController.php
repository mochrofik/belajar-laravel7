<?php

namespace App\Http\Controllers;

use App\Notifikasi;
use App\Pelatihan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelatihanController extends Controller
{
    // Status 0 : Pengajuan Awal
    // Status 2 : Ditolak
    // Status 1 : Diterima Tingkat 1

    public function index(){

        $user = Auth::user();

        return view('pelatihan.pengajuan-pelatihan', ['user' => $user ]);
    }

    public function pengajuanPelatihan(Request $request){

        $tipe_notif = 20001;

        $user = Auth::user();

        $create_pelatihan = new Pelatihan();

        
        $create_pelatihan->judul_pelatihan = $request->judul_pelatihan;
        $create_pelatihan->tanggal_pelaksanaan = $request->tanggal_pelaksanaan;
        $create_pelatihan->tanggal_selesai = $request->tanggal_selesai;
        $create_pelatihan->deskripsi = $request->deskripsi;
        $create_pelatihan->status = 0;
        $create_pelatihan->nik = $user->nik;


        
        if($request->has('filename')){
            
            $ekstensi = $request->file('filename')->getClientOriginalExtension();
            $filename = round(microtime(true) * 1000).'-'. 'brosur_pelatihan.'.$ekstensi;
                
            $request->file('filename')->move(public_path('uploads/pelatihan'), $filename);
    
            $create_pelatihan->brosur = $filename;
        }
        

        $create_pelatihan->save();


        $approver = User::where('posisi', "STAFF_PELATIHAN") ->where('active', 1)->first();


        $this->insertNotification("Terdapat pengajuan pelatihan dari ". $user->first_name. ' '. $user->last_name. "" , "Judul Pelatihan " . $request->judul_pelatihan, $tipe_notif, $create_pelatihan->id,[$approver] );


        if($create_pelatihan){
            return redirect('/home')
            ->with('success','Berhasil mengajukan pelatihan.')
            ;
            
        }else{
            return redirect('/home')
            ->with('danger','Gagal mengajukan pelatihan.')
            ;

        }


    }

    public function getPelatihan($id, $id_notif){

        if($id_notif != null){

            $this->seeNotification($id_notif);
        }

        $pelatihan = Pelatihan::where('id', $id)->with('karyawan')->first();

        return view('pelatihan.show', ['pelatihan' => $pelatihan, 'id_notif' => $id_notif ]);
    }

    public function approvalPelatihan(Request $request){

        $notif = Notifikasi::find($request->id_notif);
        $notif->approved_at = date('Y-m-d H:i:s');
        $notif->save();

        $pelatihan = Pelatihan::find($request->id_pelatihan);

        

        $status = 0;
        $approval = '';
        if($request->has('approve') && $request->approve){
            $status = 1;
            $approval = 'disetujui';
        }
        if($request->has('reject') && $request->reject){
            $status = 2;
            $approval = 'ditolak';
        }

        $pelatihan->status = $status;
        $pelatihan->save();

        return redirect('/home')->with('success', 'Pelatihan berhasil di ' . $approval);
    }
}
