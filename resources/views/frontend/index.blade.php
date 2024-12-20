@extends('layouts.front')

@section('title')
  Welcome to e-shop
@endsection

@section('content')

	@include('layouts.inc.slider')
	<div class ="py-5">
      <div class="container">
        <div class="row">
        	<h2>Featured products</h2>
        	<div class="owl-carousel featured-carousel owl-theme">

		                @foreach ($featured_products as $prod)

				            <div class="item">
				                 <div class="card h-100">
				                 	<img src="{{ asset('assets/uploads/product/'.$prod->image) }}"  alt=""
				                 	class="card-img-top img-fluid" >
				                    <div class="card-body">
				                        <h5>{{$prod->name}}</h5>
		                                <span class="float-start">${{$prod->selling_price}} </span>
				                        <span class="float-end"><s>${{$prod->original_price}}</s></span>
				                    </div>
				                 </div>
				             </div>
		        	    @endforeach
            </div>

        </div>
      </div>
	</div>

	<div class ="py-5">
      <div class="container">
        <div class="row">
        	<h2>Trending categories</h2>
        	<div class="owl-carousel featured-carousel owl-theme">
                @foreach ($trending_categories as $category)
		            <div class="item">
		            	<a href="{{url('view-category/'.$category->slug)}}">
		                 <div class="card h-100">
		                 	<img src="{{ asset('assets/uploads/category/'.$category->image) }}"  alt=""
		                 	class="card-img-top img-fluid" >
		                    <div class="card-body">
		                        <h5>{{$category->name}}</h5>
		                        <p>{{$category->description}}</p>
		                    </div>
		                 </div>
		                </a>
		            </div>
        	    @endforeach
            </div>

        </div>
      </div>
	</div>


	<div class ="py-5">
		<div class="container">
		  <div class="row">
			  <h2>Related categories</h2>
			  <div class="owl-carousel featured-carousel owl-theme">
				  @foreach ($related_categories as $category)
					  <div class="item">
						  <a href="{{url('view-category/'.$category->slug)}}">
						   <div class="card h-100">
							   <img src="{{ asset('assets/uploads/category/'.$category->image) }}"  alt=""
							   class="card-img-top img-fluid" >
							  <div class="card-body">
								  <h5>{{$category->name}}</h5>
								  <p>{{$category->description}}</p>
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
