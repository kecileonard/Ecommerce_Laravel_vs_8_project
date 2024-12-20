@extends('layouts.admin')

@section('content')
<div class='container'>
  <div class='row'>
   <div class='col-md-12'>
	<div class='card'>	  
     <div class="card-header bg-primary">
        <h4 class="text-white">Order history 
           <a href="{{url('orders')}}" class="btn btn-warning float-right"> New Orders 
           </a>
        </h4>    
     </div>  
  <div class ="card-body">
	  	
                    <table class="table table-bordered">                           
                            
                             <thead>
                               <tr>
                               	  <th>Order date</th>
                                  <th>Tracking number</th>
                                  <th>Total price </th>
                                  <th>Status </th>
                                  <th>Action </th>
                               </tr>                             
                             </thead>
                             
                             <tbody>
                                                         
                              @foreach($orders as $order)
                              <tr>
                              	   <td> {{ date('d-m-Y' , strtotime($order->created_at )) }}</td>
                                   <td> {{ $order->tracking_no}} </td>
                                   <td> ${{ $order->total_price}} </td>
                                   <td> {{ $order->status == '0' ? 'pending' :'completed'}} </td>
                                   <td>  <a href="{{ url('admin/view-order/'.$order->id)}}" class ="btn btn-primary "> View </a> 
                                   </td>

                              @endforeach  
                              </tr>
                             
                             </tbody> 

                          </table>
                        
        </div>   
         
    </div>
  </div>      
 </div>
</div>

@endsection




