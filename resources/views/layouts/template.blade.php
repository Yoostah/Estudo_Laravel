<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-item">
            <a href="/" class="nav-link">Laravel HOME</a>
        </li>
        <li class="nav-item disabled">
            <a href="/tarefas" class="nav-link">Listagem de Atividades</a>
        </li>
        <li class="nav-item">
            <a href="/tarefas/add" class="nav-link">Cadastrar Atividades</a>
        </li>
        <li class="nav-item disabled">
            <a href="/atividades" class="nav-link">Listagem de Atividades [ Eloquent ]</a>
        </li>
        <li class="nav-item">
            <a href="/atividades/add" class="nav-link">Cadastrar Atividades [ Eloquent ]</a>
        </li>

    </ul>
    <header>
        <h1>@yield('title')</h1>
    </header><br>

    <hr>
    <section>
        @yield('content')
    </section>
    <hr>
    <br>
    <footer>
        Template Laravel - {{$version}}
    </footer>
</body>

</html>
