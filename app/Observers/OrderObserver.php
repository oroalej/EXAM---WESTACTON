<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
  public function creating( Order $order ): void
  {
    $order->status   = 'processing';
  }

  public function created( Order $order ): void
  {
    $order->order_id = "OR-" . str_pad($order->id, 10, 0, STR_PAD_LEFT);
    $order->save();
  }
}
