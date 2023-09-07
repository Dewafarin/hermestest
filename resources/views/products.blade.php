@extends('home')

@section('content')

<div class="row">
  @foreach($products as $product)
  <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
    <div class="caption">
      <h3>{{ $product->product_name }}</h4>
      <p>{{ $product->product_code }}</p>
      <p><strong>Price: </strong> ${{ $product->price }}</p>
      <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-success text-center" role="button">Add to cart</a> </p>
    </div>
  </div>
  @endforeach
</div>

@endsection