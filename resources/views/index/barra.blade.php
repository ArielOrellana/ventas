<nav class="navbar navbar-expand-lg navbar-light">
      <?php
        $categoria=DB::table('categoria')->where([['status',1],['codigo',0]])->get();
    ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                  @foreach($categoria as $category)
                    <?php
                $sub_categories=DB::table('categoria')->select('id','nombre')->where([['codigo',$category->id],['status',1]])->get();
            ?>

                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$category->id}}">
                            @if(count($sub_categories)>0)
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            @endif
                        </a>
                            <a href="{{route('cats',$category->id)}}"class="dropdown-item" >{{$category->nombre}}</a>
                                    @endforeach

        </div>


      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/cart')}}"><img src="{{asset('img/carrito.png')}}" width="20" height="20"></a>
      </li>
    </ul>

  </div>
</nav>