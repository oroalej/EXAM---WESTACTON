<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Order;
use App\Observers\CartObserver;
use App\Observers\OrderObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  public function register(): void
  {

  }

  public function boot(): void
  {
    Order::observe(OrderObserver::class);
    Cart::observe(CartObserver::class);
  }
}
