    <?php
        $categoria=DB::table('categoria')->where([['status',1],['codigo',0]])->get();
    ?> 			
 			<h1 class="my-4">Lista Categoria</h1>
 			<div class="btn-group-vertical w-100">

 			@foreach($categoria as $category)
            <?php
                $sub_categories=DB::table('categoria')->select('id','nombre')->where([['codigo',$category->id],['status',1]])->get();
            ?>

 				<a class="btn btn-secondary" href="{{route('cats',$category->id)}}">{{$category->nombre}}</a>
 			@endforeach
 			</div>