<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
     protected $table = 'komunitas';
    protected $fillable = [
     'user_id',
     'kategori_id',
     'message',
     'image'
      ];

      public function user() {
    return $this->belongsTo(User::class);
}
      public function kategori_id() {
    return $this->belongsTo(Kategori::class);
}

}
