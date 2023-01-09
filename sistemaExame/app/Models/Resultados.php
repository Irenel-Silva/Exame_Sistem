<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    use HasFactory;
    protected $fillable=[
        'avaliacaos_id',
        'modelo_id',
        'pontuacaototal_aluno',
        'status',
        'user_id',
    ];
    public function Estudante(){
        return $this->belongsTo('App\Models\User');
    }

    public function Aval(){
        return $this->belongsTo('App\Models\Avaliacao');
    }
}
