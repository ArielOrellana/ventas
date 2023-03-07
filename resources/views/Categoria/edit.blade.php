@section('title','Editar Categoria')
@include('layouts.head')

@include('layouts.nav')
@if(Auth::user()->hasRole('admin'))
<div class="container">
  <div class="content">
    <div class="title m-b-md">
      <h1>Editar Categoria</h1>
    </div>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('categoria.index')}}">Categoria</a>
      </li>
      <li class="breadcrumb-item active">Editar Categoria</li>
    </ol>
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
            <a class="dropdown-item" href="{{ route('categoria.create') }}">añadir Categoria</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('categoria.index') }}">ver Categoria</a>
          </div>
        </div>
        </div>
      </div>
      <div class="col-lg-9 mb-4">
        <br>
        <form method="post" action="{{route('categoria.update',$id)}}"> 
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PATCH">
          <div class="form-group">
            <label>Nombre</label>
            <br>
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{$categoria->nombre}}">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-dark">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@else 
<!--user-->

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL={{url('/')}}">
@endif
@include('layouts.fin')