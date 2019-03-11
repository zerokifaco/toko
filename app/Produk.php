<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   	protected $table = 'produk';
   	protected $primaryKey = 'id_produk';
   	protected $fillable = ['kode_produk','id_kategori', 'nama_produk','merk', 'harga_beli','diskon', 'harga_jual', 'stok'];

   	public function kategori(){
   		return $this->belongsTo('App\Kategori');
   	}
}
