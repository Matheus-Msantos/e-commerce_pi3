<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>
    function remover() {
      return confirm('Você realmente deseja excluir esse produto?');
    }
  </script>

  <title>Lista de produtos</title>

   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
  @include('layouts.menu')
  <main class="container pt-1">
    <h1 class="py-3 text-muted">Lista de produtos</h1>

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
                <a href="{{ Route('product.show', $product->id) }}" class="text-primary mx-1 "><i class="fas fa-eye fa-lg"></i></a>
                <a href="{{ Route('product.edit', $product->id) }}" class="text-warning mx-1"><i class="fas fa-edit fa-lg"></i></a>
                <form action="{{ Route('product.destroy', $product->id) }}" method="POST" onsubmit="return remover()" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="text-danger border-none"><i class="fas fa-trash-alt fa-lg"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <a href="{{ Route('product.create') }}" class=" my-3 btn btn-outline-success">Cadastrar produto</a>

  </main>
</body>
</html>
