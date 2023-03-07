@section('title','Zontal+Admin')
@include('layouts.head')

@include('layouts.nav')

    <section>
        @include('index.barra')
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active">
            <a href="{{url('/cat/1')}}"><img src="{{asset('img/bancar.jpg')}}" class="d-block w-100 h-100" alt="...">
            </a>

        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item">
            <a href="{{url('/cat/5')}}"><img src="{{asset('img/ban.jpg')}}" class="d-block w-100 h-100" alt="...">
                </a>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item">
            <a href="{{url('/cat/3')}}"><img src="{{asset('img/banro.jpg')}}" class="d-block w-100 h-100" alt="...">
                </a>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>
 <div class="container">
    <div class="row">
        <div class="col-lg-3 mb-4">
            @include('index.categoria')
        </div>
        <div class="col-lg-9 mb-4">
            <h1 class="my-4">Productos</h1>
            <div class="row">
                        @foreach($productos as $producto)
                            @if($producto->categoria->status==1)
              <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                  <a href="{{url('/detalleprod',$producto->id)}}"><img class="card-img-top" src="{{url('products/small/',$producto->image)}}" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="{{url('/detalleprod',$producto->id)}}">{{$producto->nombre}}</a>
                    </h4>
                    <p>${{$producto->precio}}</p>
                    <a href="{{url('/detalleprod',$producto->id)}}" class="btn btn-dark">ver producto</a>
                  </div>
                </div>
            </div>
                            @endif
                        @endforeach
                    </div><!--features_items-->

                </div>
            </div>
        </div>
    </section>

@include('layouts.fin')