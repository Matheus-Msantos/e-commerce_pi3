<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Tag</title>

  <!-- CSS only -->
  <link rel="stylesheet" type="text/css" href="../../css/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/4d52201842.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a href="{{ url('/') }}"><img class="img-logo" src="../../img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ps-3" id="navCollapse">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="{{ Route('product.index') }}" id="menuDropDownProduto" data-bs-toggle="dropdown" role="button"> Produtos </a>
                <ul class="dropdown-menu" aria-labelledby="menuDropDownProduto">
                  <li>
                    <a class="dropdown-item" href="{{ Route('product.index') }}">Lista</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ Route('product.trash') }}">Lixeira</a>
                  </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" id="menuDropDownCategoria" data-bs-toggle="dropdown" role="button"> Categoria </a>
                <ul class="dropdown-menu" aria-labelledby="menuDropDownCategoria">
                  <li>
                    <a class="dropdown-item" href="{{ Route('category.index') }}">Lista</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ Route('category.trash') }}">Lixeira</a>
                  </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" id="menuDropDownTag" data-bs-toggle="dropdown" role="button"> Filtros </a>
                <ul class="dropdown-menu" aria-labelledby="menuDropDownTag">
                  <li>
                    <a class="dropdown-item" href="{{ Route('tag.index') }}">Lista</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ Route('tag.trash') }}">Lixeira</a>
                  </li>
                </ul>
            </li>
          </ul>
          <div class="ms-auto navbar-nav">
              <div class="d-flex">
                @if(Auth()->user())
                  <div class="nav-item dropdown">
                    <span class="nav-link dropdown-toggle text-white px-3" id="userDropDown" data-bs-toggle="dropdown" role="button"><i class="fas fa-user-circle"></i> {{ Auth()->user()->name }}</span>
                    <div class="dropdown-menu" aria-labelledby="userDropDown">
                      <a class="dropdown-item">Pedidos</a>
                      <a class="dropdown-item">Area do Admin</a>
                    </div>
                  </div>

                  <a class="nav-link text-white px-3" class="text-muted" href="{{ Route('cart.show') }}"><i class="fas fa-shopping-cart"></i>
                  <span class="count">({{ \App\Models\Cart::count() }})</span></a>
                  <form action="{{ Route('logout') }}" method="POST" class="d-flex">
                    @csrf
                    <button class="px-3 btn-logout" type="submit">sair</button>
                  </form>
                @else
                  <a class="text-white"  href="{{ Route('login') }}" ><i class="fas fa-sign-in-alt"></i> Entrar </a>
                  <a class="text-white ms-3" href="{{ Route('register') }}"> <i class="far fa-user"></i> Registrar</a>
                @endif
              </div>
            </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="container">
    <h1 class="py-3 text-muted">Editar Filtro</h1>

    <form method="POST" action="{{ Route('tag.update', $Tag->id )}}">
      @csrf
      @method('PATCH')
      <div class="row">
        <span class="form-label">Nome</span>
        <input type="text" class="form-control" name="name" value="{{ $Tag->name }}">
      </div>

      <div class="row mt-4 mx-5">
        <button type="submit" class="bnt btn-outline-success btn-lg">Atualizar</button>
      </div>
    </form>
  </main>
</body>
</html>
