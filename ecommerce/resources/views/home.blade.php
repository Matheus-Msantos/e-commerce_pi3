@extends('layouts.store')
@section('css')
@endsection

@section('content')

  <nav>
    <div class= "title-main">
      <div class= " navbar navbar-expand-lg col-5 ms-auto mt-2 f-bold">
        <ul class="navbar-nav">
          @foreach(App\Models\Category::all()->take(4) as $category)
            <li>
              <a class="nav-link menu-secundary mx-2" href="{{ Route('category.show', $category->id) }}">{{ $category->name }}</a>
            </li>
          @endforeach
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

    <div class="bg-light p-4 mt-4">
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

            <div class="text-center ">
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
  </section>

  <section id="banner-especial-cozinhas" class="d-flex justify-content-end align-items-center p-4 ">
    <div>
      <span class= "h1 title-main title-banner">ESPECIAL COZINHAS</span>
    </div>
  </section>

  <section>
    <div class="row my-4">
      @foreach(App\Models\Product::destaques() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img img-fluid">
          </div>

          <div class="text-center ">
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
  </section>

@endsection
