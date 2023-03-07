<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Productos;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }
	public function index(){
    $product=Productos::all();
    $product_id=Cart::all();
    return view('index.cart',compact('product','product_id'));
    }
	public function show()
	{
    $product=Productos::all();
    $product_id=Cart::all();
		return view('index.cart',compact('product_id','product'));
	}
public function add( $product_id ) {
    // For Identification Purpose
    $session_id = session()->get( '_token' );
    // Get Product Detils by ID

    $product = Productos::where( 'id', $product_id )->first();
    if ( $product == null ) {
      return abort( 404 );
    }

    if ( Cart::where( 'session_id', '=', $session_id )->exists() ) {

      //CHeck whether product exist if yes increase quantity
      $entry = Cart::where( [ 'session_id' => $session_id, 'product_id' => $product_id ] )->increment( 'qty', 1 );
      if ( ! $entry ) {
        Cart::create( [
          'session_id'   => $session_id,
          'product_id'   => $product_id,
          'product_name' => $product['nombre'],
          'price'        => $product['precio'],
          'qty'          => 1
        ] );
      }
    } else {
      Cart::create( [
        'session_id'   => $session_id,
        'product_id'   => $product_id,
        'product_name' => $product['nombre'],
        'price'        => $product['precio'],
        'qty'          => 1
      ] );
    }

    // First check whether the cart exist
    return redirect()->route( 'cart.show' );
  }
  public function destroy($id)
  {
        $product_id = Cart::find($id);
        $product_id->delete();
    return back()->with('id');
  }
}
