<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class craft extends Model
{
    protected $table = 'crafts';
    protected $fillable = [
      'nama',
      'deskripsi',
      'tutorial',
      'filter_id',
      'link_yt'
      ];

      public function filters() {
        return $this->belongsTo(filter::class,'filter_id','id');
    }
}
