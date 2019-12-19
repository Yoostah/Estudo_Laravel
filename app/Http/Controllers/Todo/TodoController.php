<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{

    public function index(){
        $lista = DB::select('SELECT *
                             FROM atividades
                             WHERE finalizado <> :status
                             ORDER BY finalizado', [
            'status' => '3'
        ]);

        return view('todo.list', ['tarefas' => $lista]);
    }

    public function add(){
        $lista = DB::select('SELECT * FROM atividades');

        return view('todo.add', ['tarefas' => $lista]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string']
        ]);

        $nome = $request->input('name');

        DB::insert('INSERT INTO atividades (name) VALUES (:nome)', [
            'nome' => $nome
        ]);

        return redirect()->route('todo.list');

    }

    public function edit($id){
        $data = DB::select('SELECT * FROM atividades WHERE id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0 ){
            return view('todo.add', ['todo' => $data[0]]);
        }else{
            return redirect()->route('todo.list');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string']
        ]);

        $name = $request->input('name');

        $data = DB::select('SELECT * FROM atividades WHERE id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0 ){

            DB::update('UPDATE atividades SET name = :nome WHERE id = :id',[
                'nome' => $name,
                'id' => $id
            ]);

        }

        return redirect()->route('todo.list');
    }

    public function delete($id){
        DB::delete('DELETE from atividades WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('todo.list');

    }

    public function check($id){
        DB::update('UPDATE atividades SET finalizado = !finalizado WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('todo.list');
    }
}