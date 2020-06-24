@extends('layouts.default')
@section('main')
  <div class="card">
    <div class="card-body">
      <div class="card-title">Order List</div>
      <table class="table">
        <thead>
        <tr>
          <th>Order ID</th>
          <th>Total</th>
          <th>Purchased Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $index => $order)
          <tr>
            <td> {{ $order->order_id }}</td>
            <td> {{ $order->total }}</td>
            <td> {{ $order->created_at->format('M d, Y H:s A') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>


    </div>

    {{ $orders->links() }}
  </div>
@endsection
