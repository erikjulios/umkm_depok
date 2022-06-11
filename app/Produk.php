<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
<<<<<<< HEAD
    public function pesanan_detail()
    {
        return $this->hasMany('App\DetailPemesanan', 'produk_id', 'id');
    }
=======
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'produk';
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
}
