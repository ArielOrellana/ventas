@section('title','Productos')
@include('layouts.head')

@include('layouts.nav')

@if(Auth::user()->hasRole('admin'))
<div class="container">
    <div class="content">
        <div class="title m-b-md">
            <h1>Productos</h1>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Productos</li>
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
                <div>
                    @include('productos.fragments.aside')
                    <h2>
                        Listado  de productos
                        <a href="{{route('productos.create')}}" class="btn btn-info">Nuevo</a>
                    </h2>
                    @include('productos.fragments.info')
                    <table border="1" class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th colspan="4"></th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach($productos as $prod)

                            <tr>
                                <td>
                                    <img src="{{url('products/small',$prod->image)}}" width="50" class="rounded">
                                </td>
                                <td>{{$prod->codigo}}</td>
                                <td>{{$prod->nombre}}</td>
                                <td>{{$prod->descripcion}}</td>
                                <td>{{$prod->categoria->nombre}}</td>
                                <td>
                                    <a href="{{ route('productos.show',$prod->id) }}" class="btn btn-info">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('productos.edit',$prod->id) }}"class="btn btn-info">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('productos.destroy',$prod->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('image-gallery.show',$prod->id)}}" class="btn btn-info">Añadir Imagenes</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@else 
<!--user-->

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL={{url('/')}}">
@endif
@include('layouts.fin')
