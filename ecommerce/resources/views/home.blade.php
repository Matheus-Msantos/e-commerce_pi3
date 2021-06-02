@extends('layouts.store')
@section('css')
@endsection

@section('content')
<div class="container">
<nav class="navbar navbar-expand-sm mx-4 mt-4">
  <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle mx-2" id="menuDropDownCategoria" data-bs-toggle="dropdown" role="button"> Categorias </a>
              <ul class="dropdown-menu" aria-labelledby="menuDropDownCategoria">
                @foreach(App\Models\Category::all() as $category)
                  <li>
                    <a class="dropdown-item" href="{{ Route('category.show', $category->id) }}">{{ $category->name }}</a>
                  </li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle mx-2" id="menuDropDownTag" data-bs-toggle="dropdown" role="button"> Filtros </a>
              <ul class="dropdown-menu" aria-labelledby="menuDropDownTag">
                @foreach(App\Models\Tag::all() as $tag)
                  <li>
                    <a class="dropdown-item" href="{{ Route('tag.show', $tag->id) }}">{{ $tag->name }}</a>
                  </li>
                  @endforeach
              </ul>
            </li>
    </ul>
  </nav>
</div>

  <section id="banner" class="d-flex justify-content-end align-items-center p-4 my-4">
    <div>
      <span class= "h1 title-main title-banner">CONFIRA NOSSAS NOVIDADES</span>
    </div>
  </section>

  <section class="p-4 my-4 container">
    <div class="row">
      <div class="text-center my-3">
        <h2 class= "title-main title-product">Queridinhos</h2>
        <span class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, velit.</span>
      </div>
    </div>

    <div class="row">
      @foreach(App\Models\Product::destaques() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10 my-3">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img-home">
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
  </section>

  <section class="bg-light p-4 my-4 container">

    <div>
      <div class="row">
        <div class="text-center">
          <h2 class= "title-main title-product h1 my-5">Novidades</h2>
        </div>
      </div>

      <div class="row">
        @foreach(App\Models\Product::novidades() as $product)
          <div class="col-lg-4 col-md-6 col-sm-10 my-3">
            <div class="img-height text-center">
              <img src="{{ asset($product->image) }}" class="img-home">
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

  <section class="p-4 my-4 container">
    <div class="row my-4">
      @foreach(App\Models\Product::especial() as $product)
        <div class="col-lg-4 col-md-6 col-sm-10 my-3">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img-home">
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
