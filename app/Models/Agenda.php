<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'usuarioDest_id',
        'usuarioDoar_id',
        'objeto_id',
        'status',
    ];

    public function objetos(){
        return $this->belongsTo(Objeto::class, 'objeto_id');
    }

    public function destinatarios(){
        return $this->belongsTo(User::class, 'usuarioDest_id');
    }

    public function doadores(){
        return $this->belongsTo(User::class, 'usuarioDoar_id');
    }
}