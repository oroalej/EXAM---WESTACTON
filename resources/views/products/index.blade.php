@extends('layouts.default')
@section('main')
  <div class="card">
    <div class="card-body">
      @if ($errors->any())
        <div class="card-text">
          <ul class="alert alert-danger" style="list-style: none">
            @foreach($errors->all() as $error)
              <li>{!! $error !!}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="card-title">Product List</div>
      <table class="table" id="product-table">
        <thead>
        <tr>
          <th>Product Name</th>
          <th>Stocks</th>
          <th>Price</th>
          <th width="200px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $index => $product)
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->price }}</td>
            <td>
              @if ($product->cart)
                <form action="{{ route('cart.update', $product->cart) }}" method="POST" class="form-inline">
                  @csrf
                  @method("PUT")
                  <input type="number" name="quantity" required class="form-control mr-2"
                         max="{{ $product->stock }}" min="0"
                         value="{{ $product->cart->quantity }}">
                  <button class="btn btn-primary">Update</button>
                </form>
              @elseif($product->stock)
                <form action="{{ route('cart.store') }}" method="POST" class="form-inline ">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <input type="number" name="quantity" required class="form-control mr-2" max="{{ $product->stock }}"
                         min="0">
                  <button class="btn btn-primary">Add</button>
                </form>
              @else
                OUT OF STOCK
              @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="card-body">
        {{ $products->links() }}
      </div>
    </div>

  </div>
@endsection
