<?php

namespace Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductSale;
use DB;

class CreateOrder
{
  public function __invoke()
  {
    return DB::transaction(static function () {
      $cart = Cart::get();

      $order = Order::create([
        'total' => $cart->sum('total')
      ]);

      $cart->each(static function ( $cart ) use ( $order ) {
        $product = $cart->product;

        $productSale = new ProductSale([
          'quantity' => $cart->quantity,
          'price'    => $product->price,
          'total'    => $cart->total
        ]);

        $product->quantity -= $cart->quantity;
        $product->save();

        $productSale->product()->associate($product);
        $productSale->order()->associate($order);
        $productSale->save();

        $cart->delete();
      });

      return $order->refresh();
    });
  }
}
