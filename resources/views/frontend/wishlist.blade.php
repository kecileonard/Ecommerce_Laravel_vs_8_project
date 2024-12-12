@extends('layouts.front')


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">

       <h6 class="mb-0">
        <a href="{{url('/')}}">
          Home
        </a>/

        <a href="{{url('wishlist')}} ">
          Wishlist
        </a>/


       </h6>
    </div>

</div>


<div class="container my-5">
     <div class="card shadow wishlistitems">
      @if($wishlists->count() > 0)
        <div class="card-body">
          @php $total= 0; @endphp
          @foreach($wishlists as $item)
          <div class="row product_data">
                <div class="col-md-2 ">
                        <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" heigth="70px"
                        width="70px"  alt="">
                </div>
                <div class="col-md-2 my-auto">
                  <h6>

                      {{ $item->products->name}}
                  </h6>
                </div>
                <div class="col-md-2 my-auto">
                  <h6>

                    ${{ $item->products->selling_price }}
                  </h6>
                </div>
                <div class="col-md-2 my-auto">
                      <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                      @if($item->products->qty >= $item->prod_qty)
                          <label for="Quantity">Quantity</label>
                          <div class="input-group text-center mb-3"style="width:130px;">

                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center"
                            value="1"/>
                            <button class="input-group-text increment-btn">+</button>

                          </div>
                      @else
                       <h6> Out of stock </h6>
                      @endif
                </div>
                <div class="col-md-2 my-auto">

                            <button type="button" class="btn btn-success  addToCartBtn ">Add To Cart
                                  <i class="fa fa-shopping-cart"></i>
                            </button>

                </div>

                 <div class="col-md-2 my-auto">

                            <button type="button" class="btn btn-danger remove-wishlist-item">
                            <i class="fa fa-trash"></i> Remove</button>

                </div>

          </div>

        @endforeach

    </div>
     <div class="card-footer">
                  <h6>

                      Total price :  ${{ $total }}

                  <a href ="{{url ('checkout')}}" class="btn btn-outline-success float-end">
                            Proceed to Checkout </a>
                  </button>
                  </h6>

     </div>
   @else
      <div class="card-body text-center">
      <!--<h2> Your <i class="fa fa-shopping-cart"></i>Cart is empty</h2>-->
      <h2> Your WishList is empty</h2>
      <a href="{{ url ('category')}}" class="btn btn-outline-primary float-end">Continue shopping</a>
      </div>
   @endif
   </div>

</div>
@endsection

