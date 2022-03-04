<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
	public function produk()
	{
		return $this->belongsTo('App\Models\Produk', 'produk_id', 'id');
	}

	public function pemesanan()
	{
		return $this->belongsTo('App\Models\Pemesanan', 'pemesanan_id', 'id');
	}
}
