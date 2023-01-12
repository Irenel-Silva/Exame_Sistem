<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{       //A tabela Avaliação e as suas classes corresponde ao Modelo/prototipo da prova
    use HasFactory;

    protected $fillable = [
        'tipoa',
        'duracao',
        'pontuacao',
        'pontuacao_min',
        'qtidade_questoes',
        'data',
        'hora',
        'uc_id',
        'user_id',
        'prova_id',
    ];
    protected $guarded= [];

    public function modelos(){
        return $this->hasMany('App\Models\Modelo');
    }

    public function utilizador(){
        return $this->belongsTo('App\Models\User');
    }
    public function uc(){
        return $this->belongsTo('App\Models\Uc');
    }

    public function result(){
        return $this->hasMany('App\Models\Resultados');
    }

    public function questoes(){
        return $this->belongsToMany('App\Models\Questoes');
    }

}
