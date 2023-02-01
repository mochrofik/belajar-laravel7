<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    //

    public function index(){

        $user = Auth::user();

        $notification = Notifikasi::whereNull('approved_at')->where('nik', $user->nik)->get();

        return view('notifikasi.index', compact('notification'))->with('i');
        
    }

    public function getCountNotification(){

        $user = Auth::user();

        $notification = Notifikasi::whereNull('approved_at')->where('nik', $user->nik)->get();

        $count['count_notif'] = count($notification);

        echo json_encode($count);



    }
    public function getCountMessages(){

        $user = Auth::user();

        $messages = Message::where('to_nik', $user->nik)->where('dilihat',0)->get();

        $count['count_message'] = count($messages);

        echo json_encode($count);



    }

    public function getMessages(){
        
        $user = Auth::user();

        $messages = Message::where('to_nik', $user->nik)-> where('dilihat',0)-> with('karyawan')->orderBy('created_at', 'desc')->limit(4);

        // $messages->created_at = $messages->created_at->format('yyyy-mm-d'); 

        $messages = $messages->get();

        $data['data'] = $messages;

        echo json_encode($data);
    }
}
