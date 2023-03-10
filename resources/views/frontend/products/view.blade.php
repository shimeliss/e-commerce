    @extends('layouts.front')

    @section('title', $products->name)

    @section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
    <h4 class="mb-0">collection/ {{$products->category->name}} / {{ $products->name}}</h4>
    </div>
    </div>
    <div class="container">
    <div class="card-shadow">
    <div class="card-body">
    <div class="row">
    <div class="col-md-4 border-right">
    <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="w-100" alt="">
    </div>
    <div class="col-md-8">
    <h2 class="mb-8">
    {{$products->name}}
    @if($products->trending == '1')
    <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag"> Trending</label>
    @endif 
    </h2> 
    <hr>
    <label class="me-3">Original Price: <s>Rs {{$products->orginal_price}}</s></label>
    <label class="fw-bold">Seling Price:Rs {{$products->selling_price}}</label>
    <p class="mt-3">
    {!! $products->small_description !!}
    </p>
    <hr>
    @if($products->qty>0)
    <label class="badge bg-success">In Stock</label>
    @else
    <label class="badge bg-danger">Out of Stock</label>
    @endif
    <div class="row mt-2">
    <div class="col-md-2">
        
    <label for="Quantity">Quantity</label>
    <div class="input-group text-center mb-3">
    <button class="input-group-text decrement-btn">-</button>
    <input type="text" name="quantity " value="1" class="form-control qty-input"/>
    <button class="input-group-text increment-btn">+</button>
    </div>
    </div>
    <div class="col-md-10">
    <br>
    <button type="button" class="btn btn-success me-3 addtocartbtn float-start">Add to wishlist <i class="fa fa-heart"></i></button>
    <button type="button" class="btn btn-primary me-3 float-start">Add to cart <i class="fa fa-shopping-cart"></i></button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection
    @section('scripts')
    <script>
   $(document).ready(function(){
    $('.increment-btn').click(function(e){
        e.preventDefault();
    });
    $('.addtocartbtn').click(function(e){
        e.preventDefault();
        var inc_value = $('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value)? 0 : value;
        if(value < 10){
            value++; 
            $('.qty-input').val(value);
        }
    });
    $('.decrement-btn').click(function(e){
        e.preventDefault();
        var dec_value = $('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value)? 0 : value;
        if(value > 1){
            value--; 
            $('.qty-input').val(value);
        }
    });
   });
   </script>
    @endsection