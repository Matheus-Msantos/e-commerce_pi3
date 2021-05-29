@extends('layouts.store')


@section('content')
  <section class="my-4">
    <div class="row">
      <div class="text-center  title-main">
        <h2 class= "title-category">{{ $tag->name }}</h2>
        <span class="text-muted">Essas espécies podem ser colocadas em varandas e em janelas que recebem grande luminosidade.</span>
      </div>
    </div>

    <div class="row">
      @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img">
          </div>

          <div class="text-center">
              <span class="d-block text-main text-product">{{ $product->name }}</span>
              <span class="d-block text-main text-price m1-2">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('product.show', $product->id) }}" class="btn btn-comprar"><i class="fas fa-cart-plus"></i></a>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-comprar">Comprar</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center m-4">
      {{ $products->links() }}
    </div>
  </section>
@endsection
