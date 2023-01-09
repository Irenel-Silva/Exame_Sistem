<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uc extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomeu',
        'qcreditos',
        'carga_horaria',
        'qprovas',
    ];

    public function modelos(){
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function perguntas(){
        return $this->hasMany('App\Models\Questoes');
    }

    public function temas(){
        return $this->hasMany('App\Models\Tema');
    }
    public function possui(){
        return $this->belongstoMany('App\Models\User');
    }
}
