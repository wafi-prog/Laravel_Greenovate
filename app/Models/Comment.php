<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'artikel_id',
        'user_id',
        'content'
    ];

    public function artikel(){
        return $this->belongsTo(Artikel::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
