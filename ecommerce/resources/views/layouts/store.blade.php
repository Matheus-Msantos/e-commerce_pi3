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
  <link rel="stylesheet" type="text/css" href="../../css/home.css">
  <link rel="stylesheet" type="text/css" href="../../css/admin.css">
  <link rel="stylesheet" type="text/css" href="../../css/cart.css">
  <link rel="stylesheet" type="text/css" href="../../css/order.css">
  <link rel="stylesheet" type="text/css" href="../../css/show.css">
  <link rel="stylesheet" type="text/css" href="../../css/show-product.css">
  <link rel="stylesheet" type="text/css" href="../../css/payment.css">
  <link rel="stylesheet" type="text/css" href="../../css/login.css">

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
          <ul class="navbar-nav">
            <li>
              <a class="nav-link menu-secundary" href="{{ url('/') }}">Home</a>
            </li>
          @foreach(App\Models\Category::all()->take(4) as $category)
            <li class="nav-item">
              <a class="nav-link menu-secundary mx-2" href="{{ Route('category.show', $category->id) }}">{{ $category->name }}</a>
            </li>
          @endforeach
          </ul>

          <div class="navbar-nav margin-account ms-auto">
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

  <main>
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

  <footer class="footer text-white py-5">
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
