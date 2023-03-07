@section('title','Detalles de Productos')
@include('layouts.head')
@include('layouts.nav')
@include('index.barra') 
    <div class="container">
        <div class="row">
        <div class="col-lg-3 mb-4">
                @include('index.categoria')
            </div>
        <div class="col-lg-9 mb-4 my-4">
                        @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
    <div class="row"><!--product-details-->
      <div class="col-md-5">
<button type="button" class="btn btn-light" data-toggle="modal" data-target=".bd-example-modal-lg"><img src="{{url('products/small',$detalleprod->image)}}"></button>
@foreach($imagesGalleries as $imagesGallery)
<button type="button" class="btn btn-light" data-toggle="modal" data-target=".bd-example-modal-lg"><img src="{{url('products/small',$imagesGallery->image)}}" width="75" style="padding: 8px;"></button>
@endforeach

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg my-slydes">
    <div class="modal-content">
      <img src="{{url('products/medium',$detalleprod->image)}}">
  </div>
</div>
      @foreach($imagesGalleries as $imagesGallery)
          
        <div class="modal-dialog modal-lg my-slides">
    <div class="modal-content">
        <img src="{{url('products/medium',$imagesGallery->image)}}">
    </div>
</div>
      @endforeach

</div>



                       <!-- @foreach($imagesGalleries as $imagesGallery)
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target=".bd-example-modal-sm"><img src="{{url('products/small',$imagesGallery->image)}}" width="75" style="padding: 8px;"></button>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <img src="{{url('products/large',$imagesGallery->image)}}">
                                </div>
                              </div>
                            </div>
                            <a href="{{url('products/large',$imagesGallery->image)}}" data-standard="{{url('products/small',$imagesGallery->image)}}">
                                <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="75" style="padding: 8px;">
                            </a>
                        @endforeach-->

            </div>
      <div class="col-md-4 my-4">
             <!-- -->
             <form method="POST" action="{{ route('cart.show') }}" enctype="multipart/form-data"> 
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{ csrf_field() }}
                    <div class="product-information"><!--/product-information-->
                        <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                        <h2>{{$detalleprod->nombre}}</h2>
                        <p>Code ID: {{$detalleprod->codigo}}</p>

                            <span id="dynamic_price">US ${{$detalleprod->precio}}</span>
                        <p><b>Availability:</b>
                            @if($totalStock>0)
                                <span id="Stock">Hay Stock</span>
                            @else
                                <span id="Stock">No hay Stock</span>
                            @endif
                        </p>
                        <p><b>Condition:</b> Nuevo</p>
                        <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                        <br>
                        <br>
                        <a href="{{route('cart.add', $detalleprod->id)}}" class="btn btn-primary">añadir carrito</a>
                    </div><!--/product-information-->
                </form>

            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active btn btn-dark"><a href="#details" data-toggle="tab">Detalles</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" >
                    {{$detalleprod->descripcion}}
                </div>

                

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $countChunk=0;?>
                    @foreach($reprod->chunk(3) as $chunk)
                        <?php $countChunk++; ?>
                        <div class="row<?php if($countChunk==1){ echo' active';} ?>">
                            @foreach($chunk as $item)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/detalleprod',$item->id)}}"><img src="{{url('/products/small',$item->image)}}" alt="" style="width: 150px;"/></a>
                                                <h2>${{$item->precio}}</h2>
                                                <p>{{$item->nombre}}</p>
                                                        <a class="btn btn-primary" href="{{url('/detalleprod',$item->id)}}">Ver Producto
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>
        </div>
    </div>
        @include('layouts.fin')