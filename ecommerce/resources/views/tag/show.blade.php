@extends('layouts.store')


@section('content')

  <section class="banner-show d-flex justify-content-center align-items-center p-4 my-4">
    <div>
      <span class= "h1 title-main title-banner-show">{{ $tag->name }}</span>
    </div>
  </section>

  <section class="my-4">
    <div class="row">
      @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img">
          </div>

          <div class="text-center">
              <span class="d-block text-main text-product">{{ $product->name }}</span>
              <span class="d-block text-main text-price mt-2">R$ {{ $product->price }}</span>
            <div class="mt-3">
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-comprar mx-1"><i class="fas fa-cart-plus fa-lg"></i></a>
              <a href="{{ Route('product.show', $product->id) }}" class="btn btn-comprar mx-1"><i class="far fa-eye fa-lg"></i></a>
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
