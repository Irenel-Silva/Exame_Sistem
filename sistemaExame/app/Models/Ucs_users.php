<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucs_users extends Model
{
    use HasFactory;
    protected $fillable = [
        'uc_id',
        'user_id',
    ];
    public function cadastra(){
        return $this->hasMany('App\Models\User');
    }
    public function registra(){
        return $this->hasMany('App\Models\Uc');
    }
}
