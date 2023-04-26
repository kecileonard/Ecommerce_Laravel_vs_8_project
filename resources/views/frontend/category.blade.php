@extends('layouts.front')

@section('title')
  Category
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
	<div class="container">

       <h6 class="mb-0">
       	<a href="{{ url('category') }}">
       		Collection
       	</a>/

       </h6>
    </div>

</div>

<div class ="py-5">
    <div class="container">
      <div class="row">

         <div class="col-md-12">
            <div class="card-group">

                    <h2>All categories</h2>
                    <div class="owl-carousel category-carousel owl-theme">

                        @foreach ($categories as $category)

                            <div class="card h-100">
                                <a href="{{url('view-category/'.$category->slug)}}">

                                    <img src="{{ asset('assets/uploads/category/'.$category->image) }}"  class="card-img-top" alt="">

                                    <div class="card-body">
                                        <h5>{{$category->name}}</h5>
                                        <p>{{$category->description}}</p>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
	        </div>
         </div>

      </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
	$('.category-carousel').owlCarousel({
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

