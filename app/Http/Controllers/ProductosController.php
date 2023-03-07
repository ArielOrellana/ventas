<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;
use App\Productos;
use App\Categoria;
use Image;
class ProductosController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$productos = Productos::orderBy('id','DESC')->paginate();
		return view('Productos.index', compact('productos'));
	}
	public function create()
	{
		$menu_active=3;
		$categoria = Categoria::all();
		return view('Productos.nuevo', compact('categoria'));
	}
	public function store(Request $request)
    {
        //$productos = new Productos();
        //$productos->codigo = $request->codigo;
        //$productos->nombre = $request->nombre;
        //$productos->descripcion = $request->descripcion;
        //$productos->modelo = $request->modelo;
        //$productos->stock = $request->stock;
        //$productos->precio = $request->precio;
        //$productos->categoria_id = $request->categoria_id;
        //$productos->image = $request->image;
        //$productos->save();

        $formInput=$request->all();
        if($request->file('image'))
        {
            $image=$request->file('image');
            if($image->isValid())
            {
                $fileName=rand(100,999999).time().'-'.str_slug($formInput['nombre'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('products/large/'.$fileName);
                $medium_image_path=public_path('products/medium/'.$fileName);
                $small_image_path=public_path('products/small/'.$fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600,600)->save($medium_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $formInput['image']=$fileName;
            }
        }
        Productos::Create($formInput);
        return redirect ('productos')->with('info','el producto fue creado correctamente');

    }
	public function show($id)
	{
		$productos = Productos::find($id);
		return view('Productos.show', compact('productos'));
	}
	public function destroy($id)
	{
		//$productos = Productos::find($id);
		//$productos->delete();
		$delete=Productos::findOrFail($id);
		$image_large=public_path().'/products/large/'.$delete->image;
        $image_medium=public_path().'/products/medium/'.$delete->image;
        $image_small=public_path().'/products/small/'.$delete->image;
        $delete->delete();
		return back()->with('info','el producto fue eliminado correctamente', 'id');
	}
    public function deleteImage($id){
        //Productos::where(['id'=>$id])->update(['image'=>'']);
        $delete_image=Productos::findOrFail($id);
        $image_large=public_path().'/products/large/'.$delete_image->image;
        $image_medium=public_path().'/products/medium/'.$delete_image->image;
        $image_small=public_path().'/products/small/'.$delete_image->image;
        $delete_image;
        return back();
    }
	public function edit($id)
    {
    	$categoria = Categoria::all();
    	$productos = Productos::find($id);
       	return view('Productos.edit', compact('productos','id','categoria'));
    }
    public function update(Request $request, $id)
	{
		$update_product = Productos::where('id', '=', $id)->first();
	  	$update_product = Productos::find($id);
        //$productos->codigo = $request->codigo;
        //$productos->nombre = $request->nombre;
        //$productos->descripcion = $request->descripcion;
        //$productos->modelo = $request->modelo;
        //$productos->stock = $request->stock;
        //$productos->precio = $request->precio;
        //$productos->categoria_id = $request->categoria_id;
        //$productos->save();
        $formInput=$request->all();
        if($update_product['image']==''){
            if($request->file('image')){
                $image=$request->file('image');
                if($image->isValid()){
                    $fileName=time().'-'.str_slug($formInput['p_name'],"-").'.'.$image->getClientOriginalExtension();
                    $large_image_path=public_path('products/large/'.$fileName);
                    $medium_image_path=public_path('products/medium/'.$fileName);
                    $small_image_path=public_path('products/small/'.$fileName);
                    //Resize Image
                    Image::make($image)->save($large_image_path);
                    Image::make($image)->resize(600,600)->save($medium_image_path);
                    Image::make($image)->resize(300,300)->save($small_image_path);
                    $formInput['image']=$fileName;
                }
            }
        }else{
            $formInput['image']=$update_product['image'];
        }
        $update_product->update($formInput);
		return redirect ('productos')->with('info','el producto fue editado correctamente','id');
	}
} 
?>