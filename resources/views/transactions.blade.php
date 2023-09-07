@extends('home')
     
@section('content')
<form action="{{ route('transactions.index') }}" method="get">
                 <div class="row">
                    <div class="col-md-5 form-group">
                        <label for="">Date From</label>
                        <input type="date" name="date_from" class="form-control" value="{{ $request->date_from }}">
                     </div>
                     <div class="col-md-5 form-group">
                        <label for="">Date From</label>
                        <input type="date" name="date_to" class="form-control" value="{{ $request->date_to }}">
                     </div>
                     <div class="col-md-2 form-group" style="margin-top:25px;">
                        <input type="submit" class="btn btn-primary" value="Search">
                     </div>
                 </div>
            </form>
            <a href="/transactions/print_pdf" class="btn btn-primary">PRINT PDF</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">document</th>
      <th scope="col">user</th>
      <th scope="col">total</th>
      <th scope="col">date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($transactions as $transaction)
    <tr>
      <td>{{$transaction->document_code}}-{{$transaction->document_number}}</td>
      <td>{{$transaction->user}}</td>
      <td>{{$transaction->total}}</td>
      <td>{{$transaction->created_at}}</td>
      <td><a href="transactions/{{$transaction->document_code}}/{{$transaction->document_number}}"> detail </a>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
      
@endsection