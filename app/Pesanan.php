<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
<<<<<<< HEAD
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function pesanan_detail()
    {
        return $this->hasMany('App\DetailPemesanan', 'pesanan_id', 'id');
    }
=======
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'pesanans';
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
}
