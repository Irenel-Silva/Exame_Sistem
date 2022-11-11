<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uc extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'qcreditos',
        'carga_horaria',
        'qprovas',
    ];

    public function modelos(){
        return $this->hasMany('App\Models\Avaliacao');
    }
}
