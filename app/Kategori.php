<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'kategori';

    public function produks()
    {
        return $this->hasMany('App\Produk', 'kategori_id', 'id');
    }

    
}
