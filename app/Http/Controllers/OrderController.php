<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Services\CreateOrder;

class OrderController extends Controller
{
  public function index()
  {
    $orders = Order::paginate(20);

    return view('orders.index', compact('orders'));
  }

  public function store()
  {
    if ( Cart::count() ) {
      app(CreateOrder::class)();
    }

    return redirect()->route('order.index');
  }
}
