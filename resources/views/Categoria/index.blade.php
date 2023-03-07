@section('title','Categoria')
@include('layouts.head')

@include('layouts.nav')
@if(Auth::user()->hasRole('admin'))

<div class="container">
    <div class="content">
        <div class="title m-b-md">
            <h1>Categoria</h1>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Categoria</li>
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
                                <a class="dropdown-item" href="{{route('categoria.create')}}">añadir Categoria</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('categoria.index')}}">ver Categoria</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="col-lg-9 mb-4">
                <div>
                    @include('categoria.fragments.aside')
                    <h2>
                        Listado  de categorias
                        <a href="{{route('categoria.create')}}" class="btn btn-info">Nuevo</a>
                    </h2>
                    @include('categoria.fragments.info')
                    <table border="1" width="100%" height="100%" class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th colspan="2"></th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach($categoria as $cat)
                            <tr>
                                <td>{{$cat->nombre}}</td>
                                <td>
                                    <a href="{{ route('categoria.edit',$cat->id) }}"class="btn btn-info">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('categoria.destroy',$cat->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger">Borrar</button>
                                    </form>
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
