@section('title','Detalles del producto')
@include('layouts.head')

@include('layouts.nav')
@if(Auth::user()->hasRole('admin'))

<div class="container">
    <div class="content">
        <h2>
            Detalles del producto 
        </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('productos.index')}}">Productos</a>
            </li>
            <li class="breadcrumb-item active">Detalles del producto</li>
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
                    <h3>
                        {{$productos->nombre}}
                    </h3>
                    <div class="col-md-8" >
                        <img class="img-fluid rounded" src="{{url('products/medium',$productos->image)}}" alt="" width="50%" height="50%">
                    </div>
                    <p>{{$productos->descripcion}}</p>
                    <table border="1" width="100%" height="100%" class="table table-striped table-dark">
                        <tr>
                            <td>codigo</td>
                            <td>modelo</td>
                            <td>stock</td>
                            <td>precio</td>
                            <td>categoria</td>
                        </tr>
                        <tr>
                            <td>{{$productos->codigo}}</td>
                            <td>{{$productos->modelo}}</td>
                            <td>{{$productos->stock}}</td>
                            <td>{{$productos->precio}}</td>
                            <td>{{$productos->categoria->nombre}}</td>
                        </tr>
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