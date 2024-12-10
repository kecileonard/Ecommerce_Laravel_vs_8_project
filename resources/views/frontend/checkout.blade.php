@extends('layouts.front')

@section('title')

@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">

       <h6 class="mb-0">
        <a href="{{url('/')}}">
          Home
        </a>/

        <a href="{{url('checkout')}} ">
          Checkout
        </a>/

       </h6>
    </div>

</div>

<div class="container mt-3">
    <form action= "{{ url('place-order') }}" method="POST">
          @csrf
          <div class="row">
                <div class="col-md-7">
                   <div class="card">
                      <div class="card-body">

                       <h6> Basic details</h6>
                       <hr>

                      <div class="row checkout-form">
                         <div class="col-md-6">
                           <label for="">First Name</label>
                           <input type="text" class="form-control firstname" name="fname" value="{{Auth::user()->name}}" placeholder="Enter first name">
                           <span id="fname_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">Last Name</label>
                           <input type="text" class="form-control lastname" name="lname" value="{{Auth::user()->lname}}" placeholder="Enter last name">
                           <span id="lname_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">Email</label>
                           <input type="email" class="form-control email" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email ">
                           <span id="email_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">Phone Number</label>
                           <input type="text" class="form-control phone" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Phone Number">
                           <span id="phone_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">Address 1</label>
                           <input type="text" class="form-control address1" name="address1" value="{{Auth::user()->address1}}" placeholder="Enter Address 1">
                           <span id="address1_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">Address 2</label>
                           <input type="text" class="form-control address2" name="address2" value="{{Auth::user()->address2}}" placeholder="Enter Address 2">
                           <span id="address2_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">City</label>
                           <input type="text" class="form-control city" name="city" value="{{Auth::user()->city}}" placeholder="Enter City">
                           <span id="city_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">State</label>
                           <input type="text" class="form-control state" name="state" value="{{Auth::user()->state}}" placeholder="Enter State">
                           <span id="state_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">Country</label>
                           <input type="text" class="form-control country" name="country" value="{{Auth::user()->country}}" placeholder="Enter Country">
                           <span id="country_error" class="text-danger"></span>
                         </div>

                         <div class="col-md-6">
                           <label for="">Pin Code</label>
                           <input type="text" class="form-control pincode" name="pincode" value="{{Auth::user()->pincode}}" placeholder="Enter Pin Code">
                           <span id="pincode_error" class="text-danger"></span>
                         </div>


                      </div>

                   </div>
                </div>

           </div>


          <div class="col-md-5">
                   <div class="card">
                      <div class="card-body">
                      <h6> Order details</h6>
                      <hr>
                      @if($cartitems->count() > 0)

                        <table class="table table-striped table-bordered">

                           <thead>
                             <tr>
                                <th>Name</th>
                                <th>Qty </th>
                                <th>Price </th>
                             </tr>
                           </thead>

                           <tbody>
                            @php $total= 0; @endphp
                            @foreach($cartitems as $item)
                            <tr>
                                 @php $total += ($item->products->selling_price * $item->prod_qty); @endphp
                                 <td> {{ $item->products->name}} </td>
                                 <td> {{ $item->prod_qty}} </td>
                                 <td> {{ $item->products->selling_price}} </td>

                            @endforeach
                            </tr>

                           </tbody>

                        </table>
                        <h6 class="px-2">Grand Total <span class="float-end">Rs {{$total }}</span></h6>
                        <hr>
                        <button type ="submit" class ="btn btn-success w-100"> Place Order | COD</button>
                        <button type ="button" class ="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Paypal</button>
                       @else
                        <h4 class="text-center"> No products in cart</h4>
                       @endif
                      </div>

                  </div>
           </div>
    </form>


</div>
@endsection

@section('scripts')
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
