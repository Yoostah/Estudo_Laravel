@extends('layouts.template')

@section('title','Listagem de Atividade - Resources')

@section('content')

@info
@if (count($tarefas) === 1)
<p>1 Atividade cadastrada</p>
@elseif (count($tarefas) > 1)
<p>{{count($tarefas)}} atividades cadastradas</p>
@else
<p>Nenhuma Atividade cadastrada!</p>
@endif
@endinfo

<a class="btn btn-outline-dark" href="{{route('tarefas.create')}}">Adicionar NOVA Tarefa</a><br>

<ul>
    @php
    $atividades_pendentes = 0;
    @endphp

    @foreach ($tarefas as $tarefa)
    <li>
        <a class="@if($tarefa->finalizado) btn btn-outline-warning @else btn btn-outline-success @endif "
            href="{{ route('tarefas.show', ['tarefa' => $tarefa->id]) }}">
            @if($tarefa->finalizado) Reabrir @else Concluir @endif
        </a>

        @if($tarefa->finalizado)
        <strike>{{ $tarefa->name }}</strike>
        @else
        @php
        $atividades_pendentes++;
        @endphp

        {{ $tarefa->name }}
        @endif

        <a class="btn btn-primary" href="{{ route('tarefas.edit', ['tarefa' => $tarefa->id]) }}"> Editar </a>
        <a class="btn btn-danger" href="{{ route('tarefas.delete', ['id' => $tarefa->id])}}"
            onclick="return confirm('Tem certeza que deseja excluir?')"> Deletar </a>

    </li>
    @endforeach
</ul>
<br>
@info
@if ($atividades_pendentes === 1)
<p>Você possui [ 1 ] atividade pendente!</p>
@elseif ($atividades_pendentes > 1)
<p>Você possui [ {{$atividades_pendentes}} ] atividades pendentes!</p>
@else
<p>Você não possui atividades pendentes!</p>
@endif
@endinfo


@endsection
