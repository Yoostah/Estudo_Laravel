<?php

namespace App\Http\Controllers\Atividade;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Atividade;

class AtividadeController extends Controller
{
    public function index(){
        $lista = Atividade::all();

        return view('atividade.list', ['tarefas' => $lista]);
    }

    public function add(){
        $lista = Atividade::all();

        return view('atividade.add', ['tarefas' => $lista]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string']
        ]);

        $nova_atividade = new Atividade;
        $nova_atividade->name = $request->input('name');
        $nova_atividade->save();

        return redirect()->route('atividades.list');

    }

    public function edit($id){
        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            return view('atividade.add', ['todo' => $atividade_editada]);
        }else{
            return redirect()->route('atividades.list');
        }
    }

    public function update(Request $request, $id){
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

        return redirect()->route('atividades.list');
    }

    public function delete($id){
        Atividade::find($id)->delete();

        return redirect()->route('atividades.list');
    }

    public function check($id){
        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            $atividade_editada->finalizado = !$atividade_editada->finalizado;
            $atividade_editada->save();
        }

        return redirect()->route('atividades.list');
    }
}