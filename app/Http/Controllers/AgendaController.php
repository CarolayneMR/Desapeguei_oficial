<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function create()
    {
        return view('agendamento.agenda');
    }

    public function store(Request $request, $id){
        $objeto = Objeto::find($id);

        Agenda::create([
            'data' => $request->data,
            'usuarioDest_id' => $request->user()->id,
            'usuarioDoar_id' => $objeto->user_id,
            'objeto_id' => $objeto->id,
            'status' => 'aberto'
        ]);

        return redirect(route('dashboard'));
    }
}