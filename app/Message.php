<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    public function karyawan(){
        return $this->hasOne('App\User', 'nik', 'nik');
    }


    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i:s',
    ];
}
