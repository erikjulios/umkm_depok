<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsipengiriman extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'opsi_pengiriman';
}
