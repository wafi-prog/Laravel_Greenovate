<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'tokos';
    protected $fillable = [
      'user_id',
      'about',
      'nama_toko',
      'lokasi',
      'img_ktp',
      'status'
      ];

      public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

}


