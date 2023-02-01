<?php

namespace App\Http\Controllers;

use App\Notifikasi;
use App\PosisiKaryawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){


        return view('register.register');
    }

    public function store(Request $request){

        $tipe_notif = 10001;



       $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'nik' => 'required|unique:users|max:10|min:5',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            
        ]);


        $user = new User();

        $user->first_name = $request->first_name;
        $user->nik = $request->nik;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($validatedData['password']);

        $user->active = 0;
        $user->profil = '';
        $user->posisi = '';

        $user->save();

        $approver = User::where('posisi', "SUPER_ADMIN") ->where('active', 1)->first();


        $this->insertNotification("Terdapat pengajuan approval registrasi akun baru ", "Pengajuan registrasi dari " . $user->first_name . " ". $user->last_name , $tipe_notif, $user->id,[$approver] );


        return redirect('/login');


    }

    public function getApprovalRegister($id, $id_notif){

        $this->seeNotification($id_notif);

        $user = User::where('id', $id)->first();

        $posisi = DB::table('posisi_karyawan')->where('status', 1)->get();


        return view('register.approval', ['user'=> $user, 'posisi' => $posisi, 'id_notif' => $id_notif] );

    }

    public function approvalRegister(Request $request){

        $notif = Notifikasi::find($request->id_notif);
        $notif->approved_at = date('Y-m-d H:i:s');
        $notif->save();


        $posisi = PosisiKaryawan::find($request->id_posisi);

        $status = 0;
        $approval = '';
        if( $request->has('approve') && $request->approve  ){
            $status = 1;
            $approval = 'menyetujui';
        }
        if($request->has('reject') && $request->reject){
            $status = 2;
            $approval = 'menolak';
        }

        $user = User::where('id', $request->id)->first();

        $user->id_posisi = $request->id_posisi;
        $user->active = $status;
        $user->posisi = $posisi->nama_posisi;


        $user->save();



        return redirect('/get-notification')->with('approval', 'Berhasil '.$approval. ' pengajuan registrasi akun baru' );



    }
}
