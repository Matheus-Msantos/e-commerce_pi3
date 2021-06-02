@extends('layouts.store')

@section('content')
  @if($category->name == 'Mudas')
  <section class="banner-mudas d-flex justify-content-center align-items-center p-4 my-4">
    <div>
     <span class= "h1 title-main title-banner-show ">{{ $category->name }}</span>
    </div>
  </section>
  @elseif($category->name == 'Sementes')
  <section class="banner-semente d-flex justify-content-center align-items-center p-4 my-4">
    <div>
     <span class= "h1 title-main title-banner-show ">{{ $category->name }}</span>
    </div>
  </section>
  @elseif($category->name == 'Fertilizantes')
  <section class="banner-fertilizante d-flex justify-content-center align-items-center p-4 my-4">
    <div>
     <span class= "h1 title-main title-banner-show ">{{ $category->name }}</span>
    </div>
  </section>
  @elseif($category->name == 'Suportes e acessórios')
  <section class="banner-suporte d-flex justify-content-center align-items-center p-4 my-4">
    <div>
     <span class= "h1 title-main title-banner-show ">{{ $category->name }}</span>
    </div>
  </section>
  @elseif($category->name == 'Hortas verticais')
  <section class="banner-hortas d-flex justify-content-center align-items-center p-4 my-4">
    <div>
     <span class= "h1 title-main title-banner-show ">{{ $category->name }}</span>
    </div>
  </section>
  @elseif($category->name == 'Manutenção')
  <section class="banner-manutencao d-flex justify-content-center align-items-center p-4 my-4">
    <div>
     <span class= "h1 title-main title-banner-show ">{{ $category->name }}</span>
    </div>
  </section>
  @endif

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

  <section class="my-4 container">
    <div class="row">
      @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-10 my-3">
          <div class="img-height text-center">
            <img src="{{ asset($product->image) }}" class="img-show">
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
