<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar produtos</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <h1>Editar produtos</h1>

    <form method="POST" action="{{ Route('product.update', $Product->id) }}">
      @method('PATCH')
      @csrf
      <div class="row">
        <span class="form-label">Nome</span>
        <input type="text" class="form-control" name="name" value="{{ $Product->name }}">
      </div>

      <div class="row">
        <span class="form-label">Descrição</span>
        <textarea class="form-control" name="description">{{ $Product->description }}</textarea>
      </div>

      <div class="row">
        <span class="form-label">Preço</span>
        <input type="number" min="0.00" max="1000000.00" step="0.01" class="form-control" name="price" value="{{ $Product->price }}">
      </div>

      <div class="row mt-4">
        <button type="submit" class="bnt btn-success btn-lg">Atualizar</button>
      </div>
    </form>
  </div>
</body>
</html>
