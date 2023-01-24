@extends('layouts.front')

@section('title')
wel come to e-shop
@endsection
@section('content')
@include('layouts.inc.slider')
 
<div class="py-3">
 <div class="container">
  <div class="row">
    <h2 style=" text-align: center;">Featured Product</h2>
  <div class="owl-carousel featured-carousel owl-theme">
    @foreach($feature_product as $prod)
        <div class="item">
         <div class="card">
          <a href="{{ url('category/'.$prod->slug.'/'.$prod->slug)}}">
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
</div> 
<div class="py-3">
 <div class="container">
  <div class="row">
    <h2 style=" text-align: center;">Trending Category</h2>
  <div class="owl-carousel featured-carousel owl-theme">
    @foreach($trending_category as $trendcate)
        <div class="item">
          <a href="{{ url('view-category/'.$trendcate->slug)}}">
         <div class="card">
          <img src="{{asset('assets/uploads/category/'.$trendcate->image)}}" alt="product image">
           <div class="card-body">
           <h5>{{$trendcate->name}}</h5>
           <p>
            {{$trendcate->description}}
           </p>
         </div>
        </div>
      </a>
       </div>
@endforeach
</div>
  </div>
 </div>
</div>
@endsection
@section('scripts')
<script>
  $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>
@endsection