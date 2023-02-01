<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //

    public function getDetail($id){

        $user = Auth::user();

        $dilihat = Message::find($id);

        $dilihat->dilihat = 1;
        $dilihat->save();

        $message = Message::select('*');
        
        $message->where(function($query) use ($dilihat){
            $query->where('nik', $dilihat->nik)
            ->Where('to_nik', $dilihat->to_nik);

        });
        $message->orWhere(function($query) use ($dilihat){
            $query->where('nik', $dilihat->to_nik)
            ->where('to_nik', $dilihat->nik);

        });

        $message =  $message->get();



        return view('messages.messages', ['message' => $message, 'user' => $user, 'to_nik' => $dilihat->nik ] );

    }

    public function sendMessage(Request $request){

        $send_message = new Message();

        $user = Auth::user();

        $send_message->nik = $user->nik;
        $send_message->message = $request->message;
        $send_message->to_nik = $request->to_nik;
        $send_message->save();

        return  redirect('/home');

        
    }

    public function getListMessages(){

        $user = Auth::user();

        $mymessage = Message::select('nik')->with('karyawan')->where('to_nik', $user->nik)->groupBy('nik')->orderBy('created_at','desc')->get(); //tipenkaryawan

        $id = [];
        $arr = [];

        $index = 0;
        foreach ($mymessage as $key => $value) {
            # code...

            $message = Message::where('nik', $value->nik)->where('to_nik', $user->nik)->orderBy('created_at','desc')->first(); //tipe message

            $arr[$index]['nik'] = $value->nik; 
            $arr[$index]['karyawan'] = $value->karyawan; 
            $arr[$index]['message'] = $message->message; 
            $arr[$index]['created_at'] = $message->created_at; 
            $arr[$index]['id'] = $message->id; 
            $arr[$index]['to_nik'] = $message->to_nik; 
            $index++;
        }


        // return $arr;

        


        return view('messages.list_message', ['message' => $arr]);
    }
}
