<?php

namespace App\Http\Controllers;

use App\Models\Objeto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objeto = Objeto::all();

       /* $objetos = Objeto::join('users', 'objetos.user_id', '=', 'users.user_id')
            ->select('objetos.*', 'users.name as doadornome')
            ->get();*/
        
        return view('objetos.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('objetos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;
            
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/objetos'), $imageName);
        }

        Objeto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'imagem' => $imageName,
            'cep' => $request->cep,
            'tipo_id' => $request->tipo,
            'user_id' => $request->user()->id
        ]);

        return redirect(route('objetos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objeto = Objeto::find($id);

        return view('objetos.show')->with('objeto', $objeto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Objeto $objeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objeto $objeto)
    {
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;
            
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/objetos'), $imageName);
        }

        $objeto->nome = $request->nome;
        $objeto->descricao = $request->descricao;
        $objeto->imagem = $imageName;
        $objeto->cep = $request->cep;
        $objeto->tipo_id = $request->tipo;
        $objeto->save();
        return redirect(route('objetos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objeto $objeto)
    {
        $objeto->delete();

        return redirect(
            route('dashboard')
        );
    }
}
