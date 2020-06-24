@extends('layouts.default')
@section('main')
  <div class="card">
    <div class="card-body">
      <div class="card-title">Cart Products</div>
      <table class="table">
        <thead>
        <tr>
          <th width="80px"></th>
          <th>Product Name</th>
          <th width="200px">Quantity</th>
          <th width="200px">Price</th>
          <th width="200px">Total</th>
          <th width="100px"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($cartProducts as $index => $cart)
          <tr>
            <td></td>
            <td>{{ $cart->product->name }}</td>
            <td>
               {{ $cart->quantity }} @if (!$cart->product->stock ) <small class="text-danger">( OUT OF STOCK )</small> @endif
            </td>
            <td>P {{ $cart->product->price }}</td>
            <td>P {{ number_format($cart->total, 2) }}</td>
            <td>
              <form action="{{ route('cart.destroy', $cart) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">
              NO PRODUCT.
            </td>
          </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
          <td><b>Summary</b></td>
          <td></td>
          <td><b>{{ $cartProducts->sum('quantity') }}</b></td>
          <td></td>
          <td><b>P {{ number_format($cartProducts->sum('total'), 2)  }}</b></td>
          <td></td>
        </tr>
        </tfoot>
      </table>

      @if ($cartProducts->count() && !$cartProducts->where('product.stock', 0)->count())
        <form action="{{ route('order.store') }}" method="POST" class="form-group text-center">
          @csrf
          <button type="submit" class="btn btn-primary">Purchase</button>
        </form>
      @endif

    </div>

    {{ $cartProducts->links() }}
  </div>
@endsection
