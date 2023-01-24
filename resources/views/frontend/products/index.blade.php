@extends('layouts.front')

@section('title')
{{ $category->name}}
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
    <h4 class="mb-0">collection/ {{$category->name}}</h4>
    </div>
    </div>
<div class="py-3">
 <div class="container">
  <div class="row">
    <!-- <h2 style=" text-align: center;">{{ $category->name}}</h2> -->
    @foreach($products as $prod)
        <div class="col-md-3 mb-3">
         <div class="card">
          <a href="{{ url('category/'.$category->slug.'/'.$prod->slug)}}">
          <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="product image">
           <div class="card-body">
           <h5>{{$prod->name}}</h5>
           <span class="float-start">{{ $prod->selling_price }}</span>
           <span class="float-end"><s>{{ $prod->orginal_price }}</s></span>
         </div>
        </a>
         </div>
        </div>
@endforeach
  </div>
 </div>
</div>
@endsection