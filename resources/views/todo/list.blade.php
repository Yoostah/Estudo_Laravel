@extends('layouts.template')

@section('title','Listagem de Atividade')

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
    <a href="{{route('tarefas.add')}}">Adicionar NOVA Tarefa</a><br>

    <ul>
    @php
        $atividades_pendentes = 0;
    @endphp
    @foreach ($tarefas as $tarefa)
        <li>
            <a href="{{ route('tarefas.done', ['id' => $tarefa->id]) }}">
                @if($tarefa->finalizado) [ Reabrir ] @else [ Concluir ] @endif
            </a>

            @if($tarefa->finalizado)
                <strike>{{ $tarefa->name }}</strike>
            @else
                @php
                $atividades_pendentes++;
                @endphp

                {{ $tarefa->name }}
            @endif

            <a href="{{ route('tarefas.edit', ['id' => $tarefa->id]) }}">[ Editar ]</a>
            <a href="{{ route('tarefas.delete', ['id' => $tarefa->id]) }}" onclick="return confirm('Tem certeza que deseja excluir?')">[ Deletar ]</a>

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
