<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanandetail extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'pesanan_detail';
}
