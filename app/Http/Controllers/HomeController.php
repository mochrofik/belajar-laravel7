<?php

namespace App\Http\Controllers;

use App\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index(){

        $user = Auth::user();

        $notification = Notifikasi::whereNull('approved_at')->where('nik', $user->nik)->get();

        return view('home', 
        ['user' => $user, 
        'notifikasi' => $notification
        ]);
    }

    
}
