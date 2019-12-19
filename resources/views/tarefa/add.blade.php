@extends('layouts.template')

@if($todo ?? '')
@section('title','Edição de Atividades - Resource')
@else
@section('title','Cadastro de Atividades - Resource')
@endif

@section('content')

@isset($tarefas)
@info
@if (count($tarefas) === 1)
<p>1 Atividade cadastrada</p>
@elseif (count($tarefas) > 1)
<p>{{count($tarefas)}} atividades cadastradas</p>
@else
<p>Nenhum Atividade cadastrada!</p>
@endif
@endinfo
@endisset

@if($errors->any())
@foreach($errors->all() as $error)
<h3 style="color:red">{{$error}}</h3><br>
@endforeach
@endif

@isset($data)

<p>{{'Última atividade cadastrada: '.$data}}</p><br>

@endisset

<form method="post" action="{{action('Tarefa\TarefaController@store')}}">
    @csrf
    <div class="form-group">
        <label for="name">Nome da Atividade</label><br>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
            placeholder="Nome da Atividade" value="{{ $todo->name ?? '' }}"><br><br>
    </div>
    <button type="submit">@if($todo ?? '') Atualizar @else Cadastrar @endif</button>
</form>
@endsection
