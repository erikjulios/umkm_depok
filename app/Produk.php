<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'produks';
    

    public function pesanan_detail()
    {
        return $this->hasMany('App\DetailPemesanan', 'produk_id', 'id');
    }

    public function umkms()
    {
        return $this->belongsTo('App\UMKM', 'umkm_id', 'id');
    }

    public function kategoris()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id', 'id');
    }
}
