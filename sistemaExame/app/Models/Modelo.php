<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $fillable=[
        'avaliacaos_id',
        'respostam',
        'pontuacaom',
        'user_id',
        'questao_id',
    ];

    protected $guarded= [];
    public function avaliac(){
        return $this->belongsTo('App\Models\Avaliacao');
    }

    public function questao(){
        return $this->belongsTo('App\Models\Questoes');
    }
    public function aluno(){
        return $this->belongsTo('App\Models\User');
    }

}
