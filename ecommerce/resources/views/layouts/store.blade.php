<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Planta Apê</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" type="text/css" href="../../css/menu.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="../../css/order.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/4d52201842.js" crossorigin="anonymous"></script>
  @yield('css')

</head>
<body>
  <header>
    <nav class="menu text-white navbar navbar-expand-sm shadow-sm">

      <div class="container-fluid">
        <a href="{{ url('/') }}"><img class="img-logo" src="../../img/logo.png"></a>
        <button class="btn-mobile navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuInfo" >
          <i class="fas fa-bars"></i>
        </button>

        <div id="menuInfo" class="collapse navbar-collapse ms-5">
          <ul class="navbar-nav text-white">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle text-white" id="menuDropDownCategoria" data-bs-toggle="dropdown" role="button"> Categorias </a>
              <ul class="dropdown-menu" aria-labelledby="menuDropDownCategoria">
                @foreach(App\Models\Category::all() as $category)
                  <li>
                    <a class="dropdown-item" href="{{ Route('category.show', $category->id) }}">{{ $category->name }}</a>
                  </li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle text-white" id="menuDropDownTag" data-bs-toggle="dropdown" role="button"> Filtros </a>
              <ul class="dropdown-menu" aria-labelledby="menuDropDownTag">
                @foreach(App\Models\Tag::all() as $tag)
                  <li>
                    <a class="dropdown-item" href="{{ Route('tag.show', $tag->id) }}">{{ $tag->name }}</a>
                  </li>
                  @endforeach
              </ul>
            </li>
          </ul>
          <div class="navbar-nav margin-account ms-auto">
            <div class="d-flex">
            @if(Auth()->user())
            <div class="nav-item dropdown">
                    <span class="nav-link dropdown-toggle text-white px-3" id="userDropDown" data-bs-toggle="dropdown" role="button"><i class="fas fa-user-circle"></i> {{ Auth()->user()->name }}</span>
                    <div class="dropdown-menu" aria-labelledby="userDropDown">
                      <a class="dropdown-item">Pedidos</a>
                      <a href="{{ Route('product.index') }}" class="dropdown-item">Area do Admin</a>
                    </div>
                  </div>
              <a class="nav-link ms-2 login" href="{{ Route('cart.show') }}"><i class="fas fa-shopping-cart"></i> <span class="count">({{ \App\Models\Cart::count() }})</span></a>
              <form action="{{ Route('logout') }}" method="POST" class="d-flex">
                @csrf
                <button class="btn-logout login" type="submit"><i class="fas fa-door-open"></i> Sair</button>
              </form>
            @else
              <a class="login"  href="{{ Route('login') }}" ><i class="fas fa-sign-in-alt"></i> Entrar </a>
              <a class="text-white ms-3" href="{{ Route('register') }}"> <i class="far fa-user"></i> Registrar</a>
            @endif
            </div>
          </div>
        </div>
      </div>
    </nav>

  </header>

  <main class="container">
    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

    @if(session()->has('error'))
      <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
      </div>
    @endif

    @yield('content')

  </main>

  <footer class="container footer text-white py-5">
    <div class="row">

    <div class="col-sm-10 col-md-4  mx-auto text-center">
        <img class="img-logo" src="../../img/logo.png">
        <p class="mt-1">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>

      <div class="col-sm-10 col-md-4 mx-auto text-center">
        <h2 class="h3 mt-5 ">Redes Sociais</h2>
        <div class="pt-1">
          <a class="mx-2 icon-redes" href="#"><i class="fab fa-facebook fa-2x"></i></a>
          <a class="mx-2 icon-redes" href="#"><i class="fab fa-instagram fa-2x"></i></a>
          <a class="mx-2 icon-redes" href="#"><i class="fab fa-twitter fa-2x"></i></a>
        </div>
      </div>


      <div class="col-sm-10 col-md-4  mx-auto text-center">
        <h2 class="h3 mt-5">Localização</h2>
        <address>
          Rua Lorem, 20 <br>
          Lorem ipsum dolor - SP <br>
          CEP: 00000-000 <br>
          Telefone: (11) 98989-8989.
        </address>
      </div>

    </div>

    <div class="row">

      <div class="col-2 ms-auto w-50 mt-4">
      <hr class="my-2">
        <div class="text-end">
          <span class="px-1"><i class="fab fa-cc-mastercard fa-2x"></i></span>
          <span class="px-1"><i class="fab fa-cc-visa fa-2x"></i></span>
          <span class="px-1"><i class="fab fa-cc-paypal fa-2x"></i></span>
          <span class="px-1"><i class="fab fa-cc-amazon-pay fa-2x"></i></span>
        </div>
      </div>
    </div>

  </footer>

</body>
</html>
