<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use DB;

class CartController extends Controller
{
  public function index()
  {
    $cartProducts = Cart::with('product')->paginate(10);

    return view('carts.index', compact('cartProducts'));
  }

  public function store( CartRequest $request )
  {
    DB::transaction(static function () use ( $request ) {
      $addedToCart = new Cart([
        'quantity' => (int) $request->get('quantity'),
      ]);

      $addedToCart->product()->associate((int) $request->get('id'));
      $addedToCart->save();
    });

    return redirect()->back();
  }

  public function update( CartRequest $request, Cart $cart )
  {
    DB::transaction(static function () use ( $request, $cart ) {
      $cart->quantity = $request->get('quantity', 0);

      if ( $cart->isDirty() ) {
        $cart->save();
      }
    });

    return redirect()->back();
  }

  public function destroy( Cart $cart )
  {
    DB::transaction(static function () use ( $cart ) {
      $product        = $cart->product;
      $product->stock += $cart->getOriginal('quantity');
      $product->save();

      $cart->delete();
    });

    return redirect()->back();
  }
}
