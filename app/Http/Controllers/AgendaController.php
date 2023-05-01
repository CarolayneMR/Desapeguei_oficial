<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;

class AgendaController extends Controller
{
    public function create()
    {
        return view('agendamento.agenda');
    }

    public function Store(Objeto $objeto, Request $request){
        $doador = $objeto->user();

        Agenda::create([
        'data' =>$request->data,
        'usuarioDest_id' =>$request->user()->usuarioDest_id,
        'usuarioDoar_id' =>$request->$doador->usuarioDoar_id,
        'objeto_id' =>$request->$objeto->objeto_id,
        'status' =>$request->status
        ]);

        return redirect(route('dashboard'));
    }
}
