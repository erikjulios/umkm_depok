<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function pesanan_detail()
    {
        return $this->hasMany('App\DetailPemesanan', 'produk_id', 'id');
    }
}
