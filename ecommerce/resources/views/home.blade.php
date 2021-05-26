@extends('layouts.store')
@section('css')
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="css/home.css">

 <section>
    <div id="menu">
      <div class= "col-4 ms-auto mt-4">
        <ul class="itens-menu">
          <li class="itens-menu-item">HOME</li>
          <li class="itens-menu-item">MUDAS</li>
          <li class="itens-menu-item">ACESSÓRIOS</li>
          <li class="itens-menu-item">FERTILIZANTES</li>
        </ul>
      <div>
    </div>


 </section>
  <section id="banner" class="d-block p-4 my-4">
    <div>
      <img class="img-banner img-fluid" src="img/topo.jpg">
        <span class= "text-lg-left h1 title" >CONFIRA NOSSAS NOVIDADES</span>
    </div>
  </section>
    <section class="my-4">
    <div class="row">
      <div class="text-center">
        <h2 class= "title-2">Queridinhos</h2>
        <span class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, velit.</span>
      </div>
    </div>

    <div class="row">
      @foreach(App\Models\Product::destaques() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img">
          </div>

          <div class="text-center">
              <span class="d-block fw-bold">{{ $product->name }}</span>
              <span class="d-block">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar ao carrinho</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <section class="my-4">
    <div class="row">
      <div class="text-center">
        <h2 class= "title-3">Novidades</h2>
        <span class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, velit.</span>
      </div>
    </div>

    <div class="row">
      @foreach(App\Models\Product::destaques() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img">
          </div>

          <div class="text-center">
              <span class="d-block fw-bold">{{ $product->name }}</span>
              <span class="d-block">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar ao carrinho</a>
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
              <span class="d-block fw-bold">{{ $product->name }}</span>
              <span class="d-block">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar ao carrinho</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    </section>
  <section id="banner-2" class="d-block p-4 my-4">
    <div>
      <img class="img-banner img-fluid" src="img/topo.jpg">
        <span class= "text-lg-left h1 title" >ESPECIAL COZINHAS</span>
    </div>
    <div class="row">
      @foreach(App\Models\Product::destaques() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img">
          </div>

          <div class="text-center">
              <span class="d-block fw-bold">{{ $product->name }}</span>
              <span class="d-block">R$ {{ $product->price }}</span>
            <div>
              <a href="{{ Route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar ao carrinho</a>
            </div>
          </div>
        </div>
      @endforeach
  </section>
  </section>
@endsection
