<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index( Request $request )
  {
    $products = Product::with('cart')
      ->paginate($request->get('per_page', 10));

    return view('products.index', compact('products'));
  }

  public function create()
  {

  }

  public function store( Request $request )
  {
    //
  }

  public function show( $id )
  {
    //
  }

  public function edit( $id )
  {
    //
  }

  public function update( Request $request, $id )
  {
    //
  }

  public function destroy( $id )
  {
    //
  }
}
