<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-item">
            <a class="btn btn-secondary btn-sm ml-3" href="/" class="nav-link">Laravel HOME</a>
        </li>
        <li class="nav-item disabled">
            <a class="btn btn-secondary btn-sm ml-3" href="/todo" class="nav-link">Listagem de Atividades</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-secondary btn-sm ml-3" href="/todo/add" class="nav-link">Cadastrar Atividades</a>
        </li>
        <li class="nav-item disabled">
            <a class="btn btn-secondary btn-sm ml-3" href="/atividades" class="nav-link">Listagem de Atividades [
                Eloquent
                ]</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-secondary btn-sm ml-3" href="/atividades/add" class="nav-link">Cadastrar Atividades [
                Eloquent
                ]</a>
        </li>
        <li class="nav-item disabled">
            <a class="btn btn-secondary btn-sm ml-3" href="/tarefas" class="nav-link">Listagem de Atividades [ Resource
                ]</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-secondary btn-sm ml-3" href="/tarefas/create" class="nav-link">Cadastrar Atividades [
                Resource
                ]</a>
        </li>

    </ul>
    <div class="jumbotron">
        <h1 class="display-4" align="center">@yield('title')</h1>
    </div>

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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>
