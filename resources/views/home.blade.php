@section('title','home')
@include('layouts.head')

@include('layouts.nav')
@if(Auth::user()->hasRole('admin'))
  <div class="container">

    <h1 class="my-4">Bienvenidos</h1>

    <ol class="breadcrumb">

      <li class="breadcrumb-item active">Home</li>
    </ol>

    <!-- Portfolio Section -->

    <div class="row">
      <div class="col-lg-3 mb-4">
        <div class="btn-group-vertical w-100">
          <a href="{{route('home')}}" class="btn btn-secondary">Home</a>
        <div class="btn-group" role="group">
          <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Productos</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('productos.create')}}">añadir producto</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('productos.index') }}">ver productos</a>
          </div>
        </div>
        <div class="btn-group" role="group">
          <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categoria</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('categoria.create')}}">añadir Categoria</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('categoria.index')}}">ver Categoria</a>
          </div>
        </div>
        </div>
      </div>
      <div class="col-lg-9 mb-4">
        <div class="row">
          <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="{{ route('productos.index') }}"><img class="card-img-top" src="img/productoss.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{ route('productos.index') }}">Productos</a>
                </h4>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="{{route('categoria.index')}}"><img class="card-img-top" src="img/hola.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{route('categoria.index')}}">Categoria</a>
                </h4>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@else 
<!--user-->

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL={{url('/')}}">
@endif
@include('layouts.fin')
