@extends('layouts.store')

@section('content')
  <h2>Carrinho de compra</h2>

  <div class="accordion">
    @foreach(App\Models\Order::where('user_id', '=', Auth()->user()->id)->get() as $order )
      <div class="accordion-item">
          <div class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item-{{ $order->id }}">
              Pedido N°  {{ $order->id }} ({{ $order->status }})
            </button>
          </div>
      </div>

      <div id="item-{{ $order->id }}" class="accordion-collapse collapse">
        <div class="accordion-body">
          <div>
            <p>{{ $order->address }} - {{ $order->address_number }} - {{ $order->address_district }} - {{ $order->address_state }} </p>
            <p>Pago com o cartão: ***{{ $order->cc_number }} </p>
          </div>
          <table class="table table-striped align-middle">
            <thaed>
              <tr>
                <th></th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order->items() as $item)
                <tr>
                  <td><img class="img-cart" src="{{ asset($item->product()->image) }}"></td>
                  <td><a href="{{ Route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</td>
                  <td><span>{{ $item->quantity }}</span></td>
                  <td><span>R$ {{ number_format ($item->price * $item->quantity, 2, ',' , '.') }}</span></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endforeach
  </div>


@endsection
