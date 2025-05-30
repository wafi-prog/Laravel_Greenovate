<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produks';
    protected $fillable = [
     'nama',
     'user_id',
     'kategori_id',
     'toko_id',
     'harga',
     'description',
     'image'
      ];

     public function user() {
    return $this->belongsTo(User::class);
}

public function kategori() {
    return $this->belongsTo(Kategori::class);
}

public function toko() {
    return $this->belongsTo(Toko::class);
}

}
