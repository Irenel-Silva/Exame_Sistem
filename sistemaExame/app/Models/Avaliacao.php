<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{       //A tabela Avaliação e as suas classes corresponde ao Modelo/prototipo da prova
    use HasFactory;

    protected $fillable = [
        'tipo',
        'duracao',
        'pontuacao',
        'pontuacao_min',
        'qtidade_questoes',
        'data',
        'uc_id',
    ];


    public function modelos(){
        return $this->hasMany('App\Models\Modelo');
    }

    public function utilizadores(){
        return $this->belongsToMany('App\Models\User');
    }
    public function uc(){
        return $this->belongsTo('App\Models\Uc');
    }

    public function result(){
        return $this->hasMany('App\Models\Resultados');
    }

}
