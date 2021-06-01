@extends('layouts.store')
@section('content')

<div class="row mx-auto justify-content-center mt-4">
  <div class="col-md-5 col-10 mx-1  bg-light p-5 my-3 border-orange">
    <h3 class="title-payment">Endereço de Entrega</h3>
    <address class="text-muted my-4">
      {{\App\Models\Address::adder()->street}}, {{\App\Models\Address::adder()->number}} <br>
      {{\App\Models\Address::adder()->district}} <br>
      CEP: {{\App\Models\Address::adder()->cep}} <br>
      {{\App\Models\Address::adder()->state}}, Brasil
    </address>
    <a href="{{Route('address.edit', Auth()->user()->id)}}" class="float-end btn btn-address">Trocar endereço</a>
  </div>

  <div class="col-md-5 col-10 mx-1 p-5 my-3 border-orange">
    <h3 class="title-payment">Resumo de Compras</h3>
    <div class="mt-3">
      <span>Quantidade de produto comprados:</span>
      <a class="float-end product-quantity" href="{{ Route('cart.show') }}"> {{ \App\Models\Cart::count() }} Produto(s)</a>
    </div>
    <div class=" mt-3">
      <span>Frete:</span>
      <span class="float-end text-success fw-bold">Grátis</span>
    </div>
    <hr>
    <div class="h4">
      <span class="text-value-payment">Total a pagar:</span>
      <span class="float-end total-number">R$ {{ number_format (\App\Models\Cart::totalValue(), 2, ',' , '.') }}</span>
    </div>
  </div>
</div>

<form class="my-5 bg-light p-5 border-orange" method="POST" action="{{ Route('order.add') }}">
  @csrf
  <h2 class="title-payment">Dados do pagamento</h2>
  <div class="row my-4">
    <div class="col-md-6 col-10">
      <label class="form-label text-muted" for="cc-nome">Nome</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
        <input class="form-control" id="cc-nome" name="cc-nome" type="text" required>
      </div>
    </div>

    <div class="col-md-6 col-10">
      <label class="form-label text-muted" for="cc-card">Número do cartão</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
        <input class="form-control" id="cc_card" name="cc_card" type="text" required>
      </div>
    </div>
  </div>

  <div class="row my-4 form-sm mx-auto">
    <div class="col-md-6 col-10">
      <label class="form-label text-muted" for="cc-cvv">Código CVV</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input class="form-control" id="cc-cvv" name="cc-cvv" type="text" required>
      </div>
    </div>

    <div class="col-md-6 col-10">
      <label class="form-label text-muted" for="cc-date">Data de expiração</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        <input class="form-control" id="cc-date" name="cc-date" type="text" required>
      </div>
    </div>
  </div>
  <div class="text-end pt-3">
    <button class="btn btn-lg btn-finish-payment text-white" type="submit">Efetuar Pagamento</button>
  </div>
</form>

@endsection
