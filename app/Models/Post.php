<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   // use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'user_id','Titulo','conteudo','status'
    ];

       public function user()
       {
           return $this->belongsTo(User::class);
       }
}
