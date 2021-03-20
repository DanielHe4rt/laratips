<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$user->name}} - Perfil</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/sandstone/bootstrap.min.css">
</head>
<body>

<div class="container text-center mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">CuriousCat de Pobre</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/{{Auth::user()->name}}">Perfil
                    </a>
                </li>
            </ul>
            @if(Auth::guard()->check())
            <ul class="form-inline my-2 my-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/auth/logout">Sair</a>
                </li>
            </ul>
            @endif
        </div>
    </nav>
    <div class="card">

        <div class="card-header">{{$user->name}} - Perfil</div>

        <div class="card-body">
            <div>
                <img src="{{$user->avatar_url}}" class="img-thumbnail" width="200" alt="..."><br>
                <strong>Perguntas: </strong> 123
            </div>
            <hr>
            <form method="POST" action="{{route('ask-question', ['user' => $user])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleTextarea">Faça uma pergunta cansada</label>
                    <textarea class="form-control" name="question" id="exampleTextarea" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="anonymous" autocomplete="off" checked> Anonimo
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="anonymous" autocomplete="off"> Logado
                            </label>
                        </div>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-primary">Perguntar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(Auth::guard()->check())
    @if($user->id == Auth::user()->id)
    @foreach($user->questions()->where('answered', false)->get() as $question)

    <div class="card text-left">
        <div class="card-body">
            <div class="text-left">
                <img src="{{$user->avatar_url}}" class="img-thumbnail" width="100" alt="..."><br>
                <strong>Anonimo perguntou: </strong> 123
            </div>
            <hr>
            <p>{{$question->question}}</p>
            @if($question->answered)
            <p>{{$question->answer}}</p>
            @else
            <form method="POST" action="{{route('answer-question', ['user' => $user, 'question' => $question])}}" class="text-left">
                @csrf
                <div class="form-group">
                    <label for="exampleTextarea">Responder</label>
                    <textarea class="form-control" name="answer" id="exampleTextarea" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <button class="btn btn-primary">Responder</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
    @endforeach
    @endif
    @endif
    <hr>
    <h3>Respondidas</h3>
    <hr>
    @foreach($user->questions()->where('answered', true)->orderByDesc('created_at')->get() as $question)
        <div class="card text-left">
            <div class="card-body">
                <div class="text-left">
                    <img src="{{$user->avatar_url}}" class="img-thumbnail" width="100" alt="..."><br>
                    <strong>Anonimo perguntou: </strong> {{$question->question}}<br>
                    <strong>Data: </strong> {{$question->created_at->format('d/m/Y H:i:s')}}<br>
                </div>
                <hr>
                <strong>Resposta: </strong> {{$question->question}}<br>
                <strong>Data: </strong> {{$question->updated_at->format('d/m/Y H:i:s')}}<br>

            </div>
        </div>
        <hr>
    @endforeach
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
