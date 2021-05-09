<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/4d52201842.js" crossorigin="anonymous"></script>
  @yield('css')

</head>
<body>

  <header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">

      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Nome</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuInfo" >
          <i class="fas fa-bars"></i>
        </button>

        <div id="menuInfo" class="collapse navbar-collapse">
          <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="menuDropDownCategoria" data-bs-toggle="dropdown" role="button"> Categorias </a>
              <ul class="dropdown-menu" aria-labelledby="menuDropDownCategoria">
                @foreach(App\Models\Category::all() as $category)
                  <li>
                    <a class="dropdown-item" href="{{ Route('category.show', $category->id) }}">{{ $category->name }}</a>
                  </li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="menuDropDownTag" data-bs-toggle="dropdown" role="button"> Tags </a>
              <ul class="dropdown-menu" aria-labelledby="menuDropDownTag">
                @foreach(App\Models\Tag::all() as $tag)
                  <li>
                    <a class="dropdown-item" href="{{ Route('tag.show', $tag->id) }}">{{ $tag->name }}</a>
                  </li>
                  @endforeach
              </ul>
            </li>
          </ul>
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

  <footer class="container bg-dark text-white py-5">
    <div class="row">

      <div class="col-6">
        <h2> Localização</h2>
        <address>
          Rua Lorem, 20 <br>
          Lorem ipsum dolor - SP <br>
          CEP: 00000-000 <br>
          Telefone: (11) 98989-8989.
        </address>
      </div>

      <div class="col-6">
        <h2>Horario de funcionamento</h2>
        <ul class="list-unstyled">
          <li>Segunda - Sexta: 9:00h as 23:00h</li>
          <li>Finais de semanas - Feriados: 10:00h as 21:00h</li>
        </ul>
      </div>

    </div>
  </footer>

</body>
</html>


