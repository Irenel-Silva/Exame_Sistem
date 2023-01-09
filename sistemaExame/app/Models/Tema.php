<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'uc_id',
    ];

    public function questoess(){
        return $this->hasMany('App\Models\Questoes');
    }
    public function uc(){
        return $this->belongsTo('App\Models\UC');
    }
}
