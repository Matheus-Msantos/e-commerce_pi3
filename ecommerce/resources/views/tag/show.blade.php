@extends('layouts.store')

@section('css')
  <style>
    .img-height{
      height: 250px;
    }
  </style>
@endsection

@section('content')
  <section class="my-4">
    <div class="row">
      <div class="text-center">
        <h2>{{ $tag->name }}</h2>
        <span class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, velit.</span>
      </div>
    </div>

    <div class="row">
      @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="h-100">
          </div>

          <div class="text-center">
              <span class="d-block fw-bold">{{ $product->name }}</span>
              <span class="d-block">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('product.show', $product->id) }}" class="btn btn-primary">Visualizar</a>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar ao carrinho</a>
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
