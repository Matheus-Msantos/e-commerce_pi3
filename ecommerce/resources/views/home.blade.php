@extends('layouts.store')

@section('css')
  <style>
    #banner {
      background: url('http://via.placeholder.com/2000x800');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      min-height: 350px;
    }

    .img-height{
      height: 250px;
    }
  </style>
@endsection

@section('content')
  <section id="banner" class="d-flex align-items-center p-4 my-4">
    <div>
      <span class="d-block h1">Espaço do banner</span>
    </div>
  </section>

  <section class="my-4">
    <div class="row">
      <div class="text-center">
        <h2>Produtos em Destaques</h2>
        <span class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, velit.</span>
      </div>
    </div>

    <div class="row">
      @foreach(App\Models\Product::destaques() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="h-100">
          </div>

          <div class="text-center">
              <span class="d-block fw-bold">{{ $product->name }}</span>
              <span class="d-block">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('product.show', $product->id) }}" class="btn btn-primary">Visualizar</a>
              <a href="" class="btn btn-primary">Adicionar ao carrinho</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
