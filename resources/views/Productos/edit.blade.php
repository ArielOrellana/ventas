@section('title','Editar Producto')
@include('layouts.head')

@include('layouts.nav')
@if(Auth::user()->hasRole('admin'))
<div class="container">
  <div class="content">
    <div class="title m-b-md">
      <h1>Editar Producto</h1>
    </div>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('productos.index')}}">Productos</a>
      </li>
      <li class="breadcrumb-item active">Editar Producto</li>
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
        <form method="post" action="{{route('productos.update',$id)}}" enctype="multipart/form-data"> 
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          {{method_field("PUT")}}
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PATCH">
          <div class="form-group">
            <label>Codigo</label>
            <br>
            <input type="text" class="form-control" placeholder="codigo" name="codigo" value="{{$productos->codigo}}">
          </div>  
          <div class="form-group">
            <label>Nombre</label>
            <br>
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{$productos->nombre}}">
          </div>
          <div class="form-group">
            <label>descripcion</label>
            <br>
            <input type="text" class="form-control" placeholder="descripcion" name="descripcion" value="{{$productos->descripcion}}">
          </div>
          <div class="form-group">
            <label>modelo</label>
            <br>
            <input type="text" class="form-control" placeholder="modelo" name="modelo" value="{{$productos->modelo}}">
          </div>
          <div class="form-group">
            <label>stock</label>
            <br>
            <input type="text" class="form-control" placeholder="stock" name="stock" value="{{$productos->stock}}">
          </div>
          <div class="form-group">
            <label>Precio</label>
            <br>
            <input type="text" class="form-control" placeholder="precio" name="precio" value="{{$productos->precio}}">
          </div>
          <div class="form-group">
              <label>categoria</label>
              <br>
              <select name="categoria_id" id="categoria_id" class="form-control">
                <option value="">-- escoja categoria --</option>
                @foreach($categoria as $categoria)
                  <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>                
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label class="control-label">Image upload</label>
                        <div class="controls">
                            <input type="file" name="image" id="image"/>
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @if($productos->image!='')
                                &nbsp;&nbsp;&nbsp;
                                <a href="javascript:" rel="{{$productos->id}}" rel1="delete-image" class="btn btn-danger btn-mini deleteRecord">Eliminar imagen antigüa</a>
                                <img src="{{url('products/small/',$productos->image)}}" width="35" alt="">
                            @endif
                        </div>
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