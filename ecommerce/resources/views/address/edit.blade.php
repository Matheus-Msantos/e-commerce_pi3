@extends('layouts.store')

@section('content')
<section class="container">
  <h1>Endereço</h1>

  <form method="POST" action="{{Route('update.address', Auth()->user()->id)}}">
      @csrf
    <div class="row">
      <span class="form-label">Rua, Av</span>
      <input type="text" class="form-control" name="street">
    </div>

    <div class="row">
      <span class="form-label">Numero</span>
      <input type="number" class="form-control" name="number">
    </div>

    <div class="row">
      <span class="form-label">Bairro</span>
      <input type="text" class="form-control" name="district">
    </div>

    <div class="row">
      <span class="form-label">Estado</span>
      <input type="text" class="form-control" name="state">
    </div>

    <div class="row">
      <span class="form-label">Cep</span>
      <input type="text" class="form-control" name="cep">
    </div>

    <div class="row my-4">
      <button type="submit" class="bnt btn-success btn-lg">trocar</button>
    </div>
  </form>
</section>
@endsection
