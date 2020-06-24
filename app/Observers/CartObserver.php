<?php

namespace App\Observers;

use App\Models\Cart;

class CartObserver
{
  public function updating( Cart $cart ): void
  {
    if ( (int) $cart->quantity === 0 && $cart->isDirty('quantity') ) {
      $cart->delete();
    }
  }
}
