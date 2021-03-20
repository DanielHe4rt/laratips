<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/sandstone/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>CuriousCat de Pobre</h1>
        @if(Auth::guard()->check())
            <a href="/{{Auth::user()->name}}" class="btn btn-primary btn-block">Visitar Perfil</a>
            <a href='/auth/logout' class="btn btn-primary btn-block">Sair</a>
        @else
        <a target="__blank" class="btn btn-primary btn-block" href="https://github.com/login/oauth/authorize?client_id={{env('GITHUB_OAUTH_ID')}}&redirect_uri={{env('GITHUB_REDIRECT_URI')}}&scopes={{env('GITHUB_OAUTH_SCOPES')}}">Fazer login com Github</a>
        @endif
    </div>
</body>
</html>
