@extends('layouts.template')

@if($todo ?? '')
    @section('title','Edição de Atividades')
@else
    @section('title','Cadastro de Atividades')
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

@if(session('error'))
    <h3 style="color:red">{{session('error')}}</h3>
@endif

@isset($data)

    <p>{{'Última atividade cadastrada: '.$data}}</p><br>

@endisset

<form method="post">
  @csrf
  <div class="form-group">
    <label for="name">Nome da Atividade</label><br>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
   placeholder="Nome da Atividade" value="{{ $todo->name ?? '' }}"><br><br>
  </div>
  <button type="submit">@if($todo ?? '') Atualizar @else Cadastrar @endif</button>
</form>
@endsection
