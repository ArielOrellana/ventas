<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Imagen;
use App\Productos;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $productos=Productos::all();
        return view('index.index',compact('productos'));
    }
    public function shop(){
        $productos=Productos::all();
        $categoria="";
        return view('index.producto',compact('productos','categoria'));
    }
    public function listByCat($id){
        $listaproducto=Productos::where('categoria_id',$id)->get();
        $categoria=Categoria::select('nombre')->where('id',$id)->first();
        return view('index.producto',compact('listaproducto','categoria'));
    }
    public function detialpro($id){
        $detalleprod=Productos::findOrFail($id);
        $imagesGalleries=Imagen::where('producto_id',$id)->get();
        $totalStock=Productos::where('id',$id)->sum('stock');
        $reprod=Productos::where([['id','!=',$id],['categoria_id',$detalleprod->categoria_id]])->get();
        return view('index.detalleprod',compact('detalleprod','imagesGalleries','totalStock','reprod'));
    }
}
