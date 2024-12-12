@extends('layouts.front')

@section('title')
 {{$category->name}}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
	<div class="container">
       <h6 class="mb-0">
       	<a href="{{ url('category') }}">
       		Collection
       	</a>/
       	   {{$category->name}}

       </h6>

    </div>

</div>

	<div class ="py-5">
      <div class="container">
        <div class="row">
        	<div class="col-md-12">
        	<h2>{{$category->name}}</h2>
        	<div class="owl-carousel product-carousel owl-theme">

                @foreach ($products as $prod)
		           	  <div class="item">
		                 <div class="card h-100">

		                 	<a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
		                 	  <img src="{{ asset('assets/uploads/product/'.$prod->image) }}"  alt=""
							   class="card-img-top img-fluid">
		                        <div class="card-body">
		                          <h5>{{$prod->name}}</h5>
		                          <span class="float-start">${{$prod->selling_price}}</span>
		                          <span class="float-end"><s>${{$prod->original_price}}</s></span>
		                      </div>
		                    </a>
		                 </div>

		           </div>
        	    @endforeach
        	 </div>
        	</div>
        </div>
      </div>
	</div>



@endsection

@section('scripts')
<script>
	$('.product-carousel').owlCarousel({
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
