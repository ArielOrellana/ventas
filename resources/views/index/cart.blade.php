@section('title','Carrito')
@include('layouts.head')
@include('layouts.nav')
@include('index.barra')
 <div class="container">
  	<div class="row">
	    <div class="col-lg-3 mb-4">
	      @include('index.categoria')
	    </div>
	    <div class="col-lg-9 mb-4">
	    	<h1 class="my-4">Carrito</h1>
	    	<table border="1" class="table table-striped table-dark">
			  <thead>
			  	
			    <tr>
			    	
			      <th>id</th>
			      <th>Productos</th>
			      <th>Precio</th>
			      <th>cantidad</th>
			      <th colspan="1"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	
			  	@foreach($product_id as $prod)
			    <tr>
			      <td>{{$prod->id}}</td>
			      <td>{{$prod->product_name}}</td>
			      <td>{{$prod->price}}</td>
			      <td>{{$prod->qty}}</td>
			      <td>
					<a class="btn btn-danger" href="{{url('/cart/destroy',$prod->id)}}">Borrar<i class="fa fa-times"></i></a>
				   </td>
			      
			    </tr>
			    @endforeach
			  </tbody>
			</table>
			<div class="form-group">
				<div class="row">
					<div class="col-auto ml-auto">
						<button>comprar</button>
					</div>
				</div>
			</div>
	    </div>
	</div>
</div>
@include('layouts.fin')