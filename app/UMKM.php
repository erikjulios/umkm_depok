<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Umkm extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'umkm';
   

    public function produks()
    {
        return $this->hasMany('App\Produk', 'umkm_id', 'id');
    }
}
