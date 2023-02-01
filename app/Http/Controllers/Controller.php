<?php

namespace App\Http\Controllers;

use App\Notifikasi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Notifications\Notification;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function insertNotification($body, $title, $type, $id_referensi, $target, $payload = null)
    {
        if (!is_array($target)) {
            $buffer_target[0]['emp_no'] = $target;
            $target = $buffer_target;
        }

        $notif = null;
        foreach ($target as $key => $value) {
           $notif = new Notifikasi();
           $notif->body = $body;
           $notif->title = $title;
           $notif->id_referensi = is_array($id_referensi) ? $id_referensi[$key] : $id_referensi;
           $notif->type = $type;
           $notif->dilihat = 0;
           $notif->nik = isset($value['nik']) ? $value['nik'] : null;
           $notif->created_at = date('Y-m-d H:i:s');
           $notif->save();           
        }
        return $notif;
    }

    public function seeNotification($id){

        $notif = Notifikasi::where('id',$id)->first();

        $notif->dilihat = 1;
        $notif->save();

        return $notif;

    }

    public function getNotification(){


        $user = Auth::user();

      
    }
}
