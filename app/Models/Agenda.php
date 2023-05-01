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
}