@extends('layouts.store')
@section('content')
  <nav arial-label="breadcrumb" class="py-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" arial-current="page">
        <a href="{{ url('/') }}">Home</a>
        </li>
      <li class="breadcrumb-item" arial-current="page">
        <a href="{{ Route('category.show', $Product->category->id)}}">{{ $Product->category->name }}</a>
      </li>
      <li class="breadcrumb-item" arial-current="page ">
      <a href="#">{{ $Product->name }}</a>
      </li>
    <ol>
  </nav>

  <div class="row text-center">

    <div class="col-6">
      <img class="py-4" src="{{ asset($Product->image) }}" style="width: 250px;">
    </div>

    <div class="col-6">
      <h2 class="py-2">{{ $Product->name }}</h2>
      <p class="py-2">{{ $Product->description }}</p>
      <span class="h4 d-block py-2">R$ {{ $Product->price }}</span>
      <button class="btn btn-primary py-2">Comprar</button>
      <h3 class="pt-4">Produtos relacionados</h3>
      @foreach($Product->tags as $tag)
        <a href="{{ Route('tag.show', $tag->id) }}" class="btn btn-sm btn-dark mb-4">{{ $tag->name }}</a>
      @endforeach
    </div>

  </div>
@endsection
