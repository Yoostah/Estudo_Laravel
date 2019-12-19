<?php

namespace App\Http\Controllers\Tarefa;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Atividade;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Atividade::all();

        return view('tarefa.list', ['tarefas' => $lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista = Atividade::all();

        return view('tarefa.add', ['tarefas' => $lista]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        $nova_atividade = new Atividade;
        $nova_atividade->name = $request->input('name');
        $nova_atividade->save();

        return redirect()->route('tarefas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Esta rota foi usada para teste da função
        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            $atividade_editada->finalizado = !$atividade_editada->finalizado;
            $atividade_editada->save();
        }

        return redirect()->route('tarefas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            return view('tarefa.add', ['todo' => $atividade_editada]);
        }else{
            return redirect()->route('tarefas.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        //Necessário liberar o mass assignment no Model
        //Atividade::find($id)->update(['name' => $request->input('name')]);

        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            $atividade_editada->name = $request->input('name');
            $atividade_editada->save();
        }

        return redirect()->route('tarefas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Atividade::find($id)->delete();

        return redirect()->route('tarefas.index');
    }
}