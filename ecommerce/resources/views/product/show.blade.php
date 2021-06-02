@extends('layouts.store')
@section('content')

  <nav arial-label="breadcrumb" class="py-4">
    <ol class="breadcrumb ms-5">
      <li class="breadcrumb-item" arial-current="page">
        <a class="breadcrumb-link text-muted" href="{{ url('/') }}">Home</a>
        </li>
      <li class="breadcrumb-item" arial-current="page">
        <a class="breadcrumb-link text-muted" href="{{ Route('category.show', $Product->category->id)}}">{{ $Product->category->name }}</a>
      </li>
      <li class="breadcrumb-item" arial-current="page ">
      <a class="breadcrumb-link text-muted" href="#">{{ $Product->name }}</a>
      </li>
    <ol>
  </nav>
  <section class="my-4 container">
    <div class="p-5">
    <div class="row text-center d-flex align-items-center">

      <div class="col-10 col-md-6">
        <img class="py-4 img-fluid img" src="{{ asset($Product->image) }}">
      </div>

      <div class="col-10 col-md-6">
        <h2 class="py-2 h1 name-product">{{ $Product->name }}</h2>
        <p class="py-2 text-muted text-description">{{ $Product->description }}</p>
        <span class="h4 d-block py-2 text-price">R$ {{ $Product->price }}</span>
        <a href="{{ Route('cart.add', $Product->id) }}" class="btn py-2 mt-3 btn-add-cart">Adicionar no carrinho</a>
        <div class="filter mt-5">
          <h3 class="filter-title text-muted">Produtos relacionados</h3>
          @foreach($Product->tags as $tag)
            <a href="{{ Route('tag.show', $tag->id) }}" class="btn btn-sm btn-filter text-btn-filter mt-1">{{ $tag->name }}</a>
          @endforeach
        <div>
      </div>

    </div>
  </section>
@endsection
