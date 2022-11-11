<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questoes extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'questao',
        'opcaoA',
        'opcaoB',
        'opcaoC',
        'opcaoD',
        'opcaoE',
        'opcaoF',
        'resposta',
        'pontuacao_questao',
    ];

    public function modelacoes(){
        return $this->belongsToMany('App\Models\Modelo');
    }
}
