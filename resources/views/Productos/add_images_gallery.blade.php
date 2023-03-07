@section('title','Añadir imagen')
@include('layouts.head')

@include('layouts.nav')
@if(Auth::user()->hasRole('admin'))
<div class="container">
    <div class="content">
        <h2>
            Añadir Imagen 
        </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('productos.index')}}">Productos</a>
            </li>
            <li class="breadcrumb-item active">Añadir Imagen</li>
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
                    <h2>{{$productos->nombre}}</h2>
                </div>
                <div class="user-thumb"> <img class="rounded" width="" height="" alt="User" src="{{url('products/small',$productos->image)}}"> </div>
                <form action="{{route('image-gallery.store')}}" method="post" role="form" enctype="multipart/form-data">
                    <label>Añadir imagenes</label>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col">
                        <input type="hidden" name="producto_id" value="{{$productos->id}}">
                        <input type="file" name="image[]" id="id_imagen" class="" multiple="multiple" required>
                        </div>
                        <div class="col">
                        <span class="text-danger">{{$errors->first('image')}}</span>
                        <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </div>
                </form>
                <div class="form-group"> 
                    <h2>Lista Imagenes</h2>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered table-dark">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th colspan="1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                            @foreach($imageGalleries as $imageGallery)
                                <tr>
                                    <td class="taskDesc" style="text-align: center;vertical-align: middle;">{{$i++}}</td>
                                    <td class="taskOptions" style="text-align: center;vertical-align: middle;"><img src="{{url('products/small',$imageGallery->image)}}" class="rounded" alt="Image" width="60"></td>
                                    <td style="text-align: center;vertical-align: middle;">            
                                <form action="{{ route('image-gallery.destroy',$imageGallery->id) }}" method="POST">
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
@else 
<!--user-->

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL={{url('/')}}">
@endif

@include('layouts.fin')