<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'cep',
        'tipo_id',
        'user_id',
    ];
    
    public function agendamentos(){
        return $this->hasMany(Agenda::class, 'objeto_id');
    }

    public function tipos(){
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }
}
