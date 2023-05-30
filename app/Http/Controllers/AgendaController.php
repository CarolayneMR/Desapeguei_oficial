<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();

        return view('agendamento.index');
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

        return redirect(route('agenda.index'));
    }
    public function update(Request $request, Agenda $agenda)
    {
        $agenda->data = $request->data;
        $agenda->save();
        return redirect(route('agenda.index'));
    }
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect(route('agenda.index'));
    }
}
