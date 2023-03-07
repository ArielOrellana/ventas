@section('title','Lista Producto')
@include('layouts.head')

@include('layouts.nav')
@include('index.barra') 
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4">
            	@include('index.categoria')
            </div>
            <div class="col-lg-9 mb-4">
                <div class="features_items"><!--features_items-->
                    <?php
                            if($categoria!=""){
                                $productos=$listaproducto;
                                echo '<h1 class="title text-center my-4">Categoria '.$categoria->nombre.'</h1>';
                            }else{
                                echo '<h1 class="title text-center my-4">Lista Productos</h1>';
                            }
                    ?>
                    <div class="row">
                    @foreach($productos as $producto)
                        @if($producto->categoria->status==1)
                              <div class="col-md-5 mb-4">
                                <a href="{{url('/detalleprod',$producto->id)}}">
                                  <img class="img-fluid rounded mb-3 mb-md-0" src="{{url('products/small/',$producto->image)}}" alt="">
                                </a>
                              </div>
                              <div class="col-md-5 mb-4">
                                <h3>{{$producto->nombre}}</h3>
                                <p>${{$producto->precio}}</p>
                                <P>{{$producto->descripcion}}</P>
                                <a class="btn btn-primary" href="{{url('/detalleprod',$producto->id)}}">Ver Producto
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                              </div>

                            
                        @endif
                    @endforeach
                </div>
                    {{--<ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>--}}
                </div><!--features_items-->
            </div>
        </div>
    </div>
    @include('layouts.fin')