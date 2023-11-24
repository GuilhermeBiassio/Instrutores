<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrutores</title>
    @vite(['resources/js/app.js'])
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <h3 class="navbar-brend"><a class="link-offset-2 link-underline link-underline-opacity-0" href="/">Instrutores</a></h3>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
                aria-controls="staticBackdrop">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Menu</h5>
            <button type="button" class="btn-close btn-lg" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('instrutores.create') }}">Diário de Instrução</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Filtrar Período</a>
                </li>
              </ul>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>