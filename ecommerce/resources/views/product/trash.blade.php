<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Lixeira de produtos</title>

   <!-- CSS only -->
   <link rel="stylesheet" type="text/css" href="../../css/admin.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/4d52201842.js" crossorigin="anonymous"></script>
  <script>
    function restore() {
      return confirm('Você realmente deseja restaurar esse produto?');
    }
  </script>

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
                <div class="nav-item dropdown align-middle mx-2">
                  <span class="nav-link dropdown-toggle text-white px-3" id="userDropDown" data-bs-toggle="dropdown" role="button"><i class="fas fa-user-circle"></i> {{ Auth()->user()->name }}</span>
                  <div class="dropdown-menu" aria-labelledby="userDropDown">
                    <a class="dropdown-item" href="{{ Route('order.show') }}">Lista de compras</a>
                    <a class="dropdown-item" href="{{ Route('product.index') }}">Area do Admin</a>
                  </div>
                </div>
                <a class="nav-link mx-2 login" href="{{ Route('cart.show') }}"><i class="fas fa-shopping-cart fa-lg"></i> <span class="count">({{ \App\Models\Cart::count() }})</span></a>
                <form action="{{ Route('logout') }}" method="POST" class="d-flex">
                  @csrf
                  <button class="btn-logout login mx-2" type="submit"><i class="fas fa-door-open fa-lg"></i> Sair</button>
                </form>
              @else
                <a class="login mx-3"  href="{{ Route('login') }}" ><i class="fas fa-sign-in-alt fa-lg"></i> Entrar </a>
                <a class="login mx-3" href="{{ Route('register') }}"> <i class="far fa-user fa-lg"></i> Registrar</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="container pt-1">
    <h1 class="py-3 text-muted">Lixeira de produtos</h1>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif
    <div class="row">
      <table class="table table-striped text-center align-middle">
        <thead class="table-success">
          <tr>
            <th>#</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Ações</th>
          </tr>
        </thead>

        <tbody>
          @foreach($Products as $product)
            <tr>
              <td class="col-1">{{ $product->id }}</td>
              <td class="col-1"><img src="{{ $product->image }}" style="width: 60px;"></td>
              <td class="col-1">{{ $product->name }}</td>
              <td class="col-3">{{ $product->description }}</td>
              <td class="col-1">{{ $product->price }}</td>
              <td class="col-1">{{ $product->category->name }}</td>
              <td class="col-2">
                <form action="{{ Route('product.restore', $product->id) }}" method="POST" onsubmit="return restore()" class="d-inline">
                  @method('PATCH')
                  @csrf
                  <button type="submit" class="btn btn-outline-success"><i class="fas fa-trash-restore-alt"></i> Resturar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </main>
</body>
</html>
