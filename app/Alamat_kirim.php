<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat_kirim extends Model
{
    public function pesanan()
    {
        return $this->belongsTo('App\Pesanan', 'pesanan_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
