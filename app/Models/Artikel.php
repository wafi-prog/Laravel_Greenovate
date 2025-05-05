<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
  protected $fillable = [
    'title',
    'artikel',
    'image',
    'kategori_id'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
}
