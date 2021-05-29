@extends('layouts.store')
@section('css')
@endsection

@section('content')

  <nav>
    <div id="menu" class= "title-main">
      <div class= " navbar navbar-expand-lg col-5  navbar-light ms-auto mt-2">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="">HOME</a>
          </li>
          <li class= "navbar-item">
            <a class="nav-link" href="">MUDAS</a>
          </li>
          <li class="navbar-item">
            <a class="nav-link" href="#">ACESSÓRIOS</a>
          </li>
          <li class="navbar-item">
            <a class= "nav-link" href="#">FERTILIZANTES</a>
          </li>
        </ul>
      <div>
    </div>
  </nav>

  <section id="banner" class="d-flex justify-content-end align-items-center p-4 my-4">
    <div>
      <span class= "h1 title-main title-banner">CONFIRA NOSSAS NOVIDADES</span>
    </div>
  </section>
  <section class="my-4">
    <div class="row">
      <div class="text-center my-3">
        <h2 class= "title-main title-product">Queridinhos</h2>
        <span class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, velit.</span>
      </div>
    </div>

    <div class="row">
      @foreach(App\Models\Product::destaques() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img">
          </div>

          <div class="text-center ">
              <span class="d-block text-main text-product">{{ $product->name }}</span>
              <span class="d-block text-main text-price">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-comprar">Adicionar ao carrinho</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="bg-light p-4 my-4">
      <div class="row">
        <div class="text-center">
          <h2 class= "title-main title-product h1 my-5">Novidades</h2>
        </div>
      </div>

      <div class="row">
        @foreach(App\Models\Product::destaques() as $product)
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="img-height text-center">
              <img src="{{ asset($product->image) }}" class="img">
            </div>

            <div class="text-center">
                <span class="d-block text-main text-product">{{ $product->name }}</span>
                <span class="d-block text-main text-price">R$ {{ $product->price }}</span>
              <div>
                <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-comprar">Adicionar ao carrinho</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="row">
        @foreach(App\Models\Product::destaques() as $product)
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="img-height text-center">
              <img src="{{ asset($product->image) }}" class="img">
            </div>

            <div class="text-center">
                <span class="d-block text-main text-product">{{ $product->name }}</span>
                <span class="d-block text-main text-price">R$ {{ $product->price }}</span>
              <div>
                <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-comprar">Adicionar ao carrinho</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section id="banner-especial-cozinhas" class="d-flex justify-content-end align-items-center p-4 my-4">
    <div>
        <span class= "h1 title-main title-banner">ESPECIAL COZINHAS</span>
    </div>
  </section>

  <section>
    <div class="row">
      @foreach(App\Models\Product::destaques() as $product)

          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="img-height text-center">
              <img src="{{ asset($product->image) }}" class="img">
            </div>

            <div class="text-center">
              <span class="d-block text-main text-product">{{ $product->name }}</span>
              <span class="d-block text-main text-price">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn-comprar btn">Adicionar ao carrinho</a>
            </div>
          </div>
          </div>

      @endforeach
    </div>
  </section>

@endsection
