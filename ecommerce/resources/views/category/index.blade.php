<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>
    function remover() {
      return confirm('Você realmente deseja excluir essa categoria?');
    }
  </script>

  <title>Lista de categorias</title>

   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
  @include('layouts.menu')
  <main class="container pt-1">
    <h1 class="py-3 text-muted">Lista de categorias</h1>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

    <div class="row">
      <table class="table table-striped text-center align-middle">
        <thead class="table-success">
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Qth</th>
            <th>Ações</th>
          </tr>
        </thead>

        <tbody>
          @foreach($Categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->products->count() }}</td>
              <td>
                <a href="{{ Route('category.show', $category->id) }}" class=" text-primary mx-1"><i class="fas fa-eye fa-lg"></i></a>
                <a href="{{ Route('category.edit', $category->id) }}" class=" text-warning mx-1"><i class="fas fa-edit fa-lg"></i></a>
                <form action="{{Route('category.destroy', $category->id)}}" method="POST" onsubmit="return remover()" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-danger border-none"><i class="fas fa-trash-alt fa-lg"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <a href="{{ Route('category.create') }}" class="btn btn-outline-success">Cadastrar categoria</a>

  </main>
</body>
</html>
