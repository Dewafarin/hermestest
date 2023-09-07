@extends('home')
     
@section('content')
      
<table class="table">
  <thead>
    <tr>
      <th scope="col">document</th>
      <th scope="col">product code</th>
      <th scope="col">price</th>
      <th scope="col">qty</th>
      <th>subtotal</th>
    </tr>
  </thead>
  <tbody>
  @foreach($transaction as $data)
    <tr>
      <td>{{$data->document_code}}-{{$data->document_number}}</td>
      <td>{{$data->product_code}}</td>
      <td>{{$data->currency}}{{$data->price}}</td>
      <td>{{$data->qty}} {{$data->unit}}</td>
      <td>{{$data->currency}}{{$data->subtotal}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
      
@endsection