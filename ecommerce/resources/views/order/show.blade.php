@extends('layouts.store')

@section('content')
  <h2 class="title-order my-4">Lista de compras</h2>

  <div class="accordion accordion-flush my-5">
    @foreach(App\Models\Order::where('user_id', '=', Auth()->user()->id)->get() as $order )
      <div class="accordion-item">
          <div class="accordion-header">
            <button class="accordion-button collapsed btn-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#item-{{ $order->id }}">
              Pedido N°  {{ $order->id }} ({{ $order->status }})
            </button>
          </div>
      </div>

      <div id="item-{{ $order->id }}" class="accordion-collapse collapse">
        <div class="accordion-body bg-list">
          <div>
            <p class="info"><span class="info-payment">Endereço para entrga: </span> {{ $order->address }}, {{ $order->address_number }}, {{ $order->address_district }} - {{ $order->address_state }} </p>
            <p class="info"><span class="info-payment">Pago com o cartão:</span> ***{{ $order->cc_number }} </p>
          </div>

              @foreach($order->items() as $item)
                <div class="d-flex justify-content-between align-items-center">
                  <img class="img-order" src="{{ asset($item->product()->image) }}">
                  <a class="name-item" href="{{ Route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a>
                  <span class="quantity-item">Qtd: {{ $item->quantity }}</span>
                  <span class="value-item">R$ {{ number_format ($item->price * $item->quantity, 2, ',' , '.') }}</span>
                </div>
              @endforeach

        </div>
      </div>
    @endforeach
  </div>


@endsection
