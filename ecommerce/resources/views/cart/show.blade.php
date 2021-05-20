@extends('layouts.store')

@section('css')
  <style>
    .img-cart{
      height: 65px;
    }
  </style>
@endsection

@section('content')
  <h2>Carrinho de compra</h2>
  <table class="table table-striped align-middle">
    <thaed>
      <tr>
        <th>Produto</th>
        <th></th>
        <th>Quantidade</th>
        <th></th>
        <th>Preço</th>
      </tr>
    </thead>
    <tbody>
      @php
        $total = 0;
      @endphp

      @foreach($cart as $item)
        <tr>
          <td><img class="img-cart" src="{{ asset($item->product()->image) }}"></td>
          <td><a href="{{ Route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</td>
          <td><span>{{ $item->quantity }}</span></td>
          <td>
            <a class="btn btn-lg btn-success" href="{{ Route('cart.add', $item->product()->id) }}">+</a>
            <a class="btn btn-lg btn-danger" href="{{ Route('cart.remove', $item->product()->id) }}">-</a>
          </td>
          <td><span>R$ {{ number_format ($item->product()->price * $item->quantity, 2, ',' , '.') }}</span></td>
        </tr>

        @php
        $total += $item->product()->price * $item->quantity;
        @endphp

      @endforeach
    </tbody>
  </table>

  <div class="text-end my-3">
    <span class="h4 d-block">Total: {{ number_format($total, 2, ',' , '.' ) }}</span>
    <a class="btn btn-lg bg-primary text-white" href="{{ Route('cart.payment') }}">Finalizar compra</a>
  </div>
@endsection
