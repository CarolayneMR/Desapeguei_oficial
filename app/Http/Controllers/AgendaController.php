<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;
use App\Models\Agenda;
use App\Http\Controllers\Log;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();

        return view('agendamento.index');
    }

    public function store(Request $request, $id){
        $objeto = Objeto::find($id);
        if($objeto->user_id != $request->user()->id){
            Agenda::create([
                'data' => $request->data,
                'usuarioDest_id' => $request->user()->id,
                'usuarioDoar_id' => $objeto->user_id,
                'objeto_id' => $objeto->id,
                'status' => 'aberto'
            ]);
            return redirect(route('agenda.index'));
        }else{
            return redirect(route('agenda.index'))->withErrors(['msg' => 'Não é possível realizar um agendamento para se mesmo. Burro!']);;
        }
    }
    public function update(Request $request, Agenda $agenda)
    {
        $agenda->data = $request->data;
        $agenda->save();
        return redirect(route('agenda.index'));
    }


    public function updateStatus(Agenda $agenda, Request $request)
    {
        if($agenda->status == "aberto" && $agenda->usuarioDoar_id == $request->user()->id){
        $agenda->status = "em andamento";
        }else if($agenda->status == "em andamento" && $agenda->usuarioDest_id == $request->user()->id){
            $agenda->status = "entregue";
        }
        $agenda->save();
        return redirect(route('agenda.index'));
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect(route('agenda.index'));
    }
}
