@extends('layouts.store')

@section('content')
<section class="my-4 container">
    <h2 class="mt-3 title-cart">Meu Carrinho</h2>
    <div class="row">
        @php
          $total = 0;
        @endphp

        @foreach($cart as $item)
          <div class="col-10 p-4 my-2 mx-auto product-card">
            <div class="d-flex align-items-center">
              <img class="img-cart" src="{{ asset($item->product()->image) }}">
              <div class="d-flex flex-column ms-4">
                <a class="mb-5 name-product" href="{{ Route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a>
                <div>
                  <span class="value-item me-5">R$ {{ number_format ($item->product()->price * $item->quantity, 2, ',' , '.') }}</span>
                  <div class="add-product d-inline mt-3 ms-5">
                    <a class="btn btn-add mb-1" href="{{ Route('cart.add', $item->product()->id) }}">+</a>
                    <span class="quantity-item mx-2">{{ $item->quantity }}</span>
                    <a class="btn btn-remove mb-1" href="{{ Route('cart.remove', $item->product()->id) }}">-</a>
                  </div>
                </div>
                @php
                $total += $item->product()->price * $item->quantity;
                @endphp
              </div>
            </div>
          </div>
        @endforeach

    <div class="row">
      <div class="col-10 mx-auto my-3">
        <div class="d-flex">
        <span class="h4 value-total">Valor: </span>
        <span class="h4 ms-auto value-total-number">R$ {{ number_format($total, 2, ',' , '.' ) }}</span>
        </div>

        <div class="text-end mt-4">
          <a class="btn btn-lg btn-finish" href="{{ Route('address.create') }}">Finalizar compra</a>
        </div>

      </div>
    </div>
  </section>
@endsection
