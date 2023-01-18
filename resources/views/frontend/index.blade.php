@extends('layouts.front')

@section('title')
wel come to e-shop
@endsection
@section('content')
@include('layouts.inc.slider')
<div class="py-5">
 <div class="container">
  <div class="row">
    @foreach($feature_product as $prod)
        <div class="col-md-3">
         <div class="card">
          <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="product image">
           <div class="card-body">
           <h5>{{$prod->name}}</h5>
           <small>{{ $prod->selling_price }}</small>
         </div>
         </div>
        </div>
@endforeach
  </div>
 </div>
</div>
@endsection
