@extends('layouts.admin')

@section('content')

	<div class='card'>
	  <div class ="card-header">
	    <h1>Products <h1>
	  </div>

	  <div class ="card-body">
	  		
		  <table class="table table-bordered table-striped">
          <thead>
		    <tr>
	  		  <th> Id </th>
	  		  <th> Category Name </th>
	  		  <th> Name </th>	  		 
	  		  <th> Description </th>
	  		  <th> Original price </th>
	  		  <th> Selling price </th>
	  		  <th> Image </th>
	  		  <th> Action</th>	  		  
	  	    </tr>
	  	  </thead>
	  	  <tbody>
	  	    @foreach ($products as $product)
		    
		  	    <tr>
		  	       <td> {{$product->id}}   </td>
		  	       <td> {{$product->category->name}} </td>
		  	       <td> {{$product->name}} </td>
		  	       <td> {{$product->description}} </td>
		  	       <td> ${{$product->original_price}} </td>
		  	       <td> ${{$product->selling_price}} </td>
		  	      
		  	       <td> 
		  	       	     <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="cate-image"
		  	       	      alt=""> 
		  	       </td>
		  	       <td> 
		  	         <a href= "{{ url('/edit-product/'.$product->id) }}" class ="btn btn-primary">Edit </a>
		  	         <a href= "{{ url('/delete-product/'.$product->id) }}" class ="btn btn-danger">Delete </a>
		  	        
		  	       </td>  
		  	    </tr>  
		    
		    @endforeach
		 </tbody>   
		 </table>   
	  </div>
	

	</div>

@endsection