@extends('layouts.store')
@section('content')
<h2>Pagamentos</h2>
<div class="row mx-auto justify-content-center">
  <div class="col-md-6 col-10  bg-light p-5 my-3">
    <h3>Endereço de Entrega</h3>
    <address>
      {{\App\Models\Address::adder()->street}}, {{\App\Models\Address::adder()->number}} <br>
      {{\App\Models\Address::adder()->district}} <br>
      {{\App\Models\Address::adder()->state}} <br>
      CEP: {{\App\Models\Address::adder()->cep}} <br>
      Brasil
    </address>
    <a href="{{Route('address.edit', Auth()->user()->id)}}" class="float-end">Trocar endereço</a>
  </div>

  <div class="col-md-6 col-10 p-5 my-3">
    <h3>Resumo de Compras</h3>
    <div class="mt-3">
      <span>Quantidade de produto comprados:</span>
      <a class="float-end" href="{{ Route('cart.show') }}"> 10 produto(s)</a>
    </div>
    <div class=" mt-3">
      <span>Frete:</span>
      <span class="float-end text-success fw-bold">Grátis</span>
    </div>
    <hr>
    <div class="h4">
      <span>Total a pagar:</span>
      <span class="float-end">R$ {{ number_format (\App\Models\Cart::totalValue(), 2, ',' , '.') }}</span>
    </div>
  </div>
</div>

<form class="my-5 bg-light p-5" method="POST" action="{{ Route('order.add') }}">
  @csrf
  <h2>Dados do pagamento</h2>
  <div class="row my-4">
    <div class="col-md-6 col-10">
      <label class="form-label" for="cc-nome">Nome</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
        <input class="form-control" id="cc-nome" name="cc-nome" type="text" required>
      </div>
    </div>

    <div class="col-md-6 col-10">
      <label class="form-label" for="cc-card">Número do cartão</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
        <input class="form-control" id="cc_card" name="cc_card" type="text" required>
      </div>
    </div>
  </div>

  <div class="row my-4">
    <div class="col-md-6 col-10">
      <label class="form-label" for="cc-cvv">Código CVV</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input class="form-control" id="cc-cvv" name="cc-cvv" type="text" required>
      </div>
    </div>
    <div class="col-md-6 col-10">
      <label class="form-label" for="cc-date">Data de expiração</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        <input class="form-control" id="cc-date" name="cc-date" type="text" required>
      </div>
    </div>
  </div>
  <div class="text-end pt-3">
    <button class="btn btn-lg bg-success text-white" type="submit">Efetuar Pagamento</button>
  </div>
</form>

@endsection
