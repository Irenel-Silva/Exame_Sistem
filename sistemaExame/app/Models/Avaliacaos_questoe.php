<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacaos_questoe extends Model
{
    use HasFactory;

    protected $fillable = [
        'avaliacaos_id',
        'questoes_id',
    ];


    public function avalia(){
        return $this->hasMany('App\Models\Avaliacao');
    }
    public function questionario(){
        return $this->hasMany('App\Models\Questoes');
    }
}
