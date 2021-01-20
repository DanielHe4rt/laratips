<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laratips </title>

    <link rel="stylesheet" href="https://bootswatch.com/4/pulse/bootstrap.min.css">
</head>
<body>
<header>

    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"
                     viewBox="0 0 24 24" focusable="false">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                <strong>Laratips Album</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main" class="container">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form method="POST" action="{{ route('new-album') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <legend>Criar novo Post</legend>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile02">
                                        <label class="custom-file-label"  for="inputGroupFile02">Escolha o Arquivo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descrição</label>
                                <textarea type="email" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> </textarea>
                                <small id="emailHelp" class="form-text text-muted">Decrição da imagem acima</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">

        <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a
                href="/docs/4.3/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>
</body>
</html>
