<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    public function karyawan()
    {
        return $this->hasOne('App\User', 'nik', 'nik');
    }
}
