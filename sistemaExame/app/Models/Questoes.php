<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questoes extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipoq',
        'questao',
        'opcaoA',
        'opcaoB',
        'opcaoC',
        'opcaoD',
        'opcaoE',
        'opcaoF',
        'respostaq',
        'pontuacao_questao',
        'uc_id',
    ];
    protected $guarded= [];
    public function modelacoes(){
        return $this->belongsToMany('App\Models\Modelo');
    }
    public function uc(){
        return $this->belongsTo('App\Models\Uc');
    }
    public function tema(){
        return $this->belongsTo('App\Models\Tema');
    }


    public function avaliacoes(){
        return $this->belongsToMany('App\Models\Avaliacao');
    }

}
