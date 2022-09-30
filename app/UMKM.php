<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UMKM extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'umkm';
   

    public function produks()
    {
        return $this->hasMany('App\Produk', 'umkm_id', 'id');
    }

    public function cabang()
    {
        return $this->belongsTo('App\Cabang', 'cabang_id', 'id');
    }

}
