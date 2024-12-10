@extends('layouts.admin')

@section('content')

	<div class='card'>
	  <div class ="card-header">
	    <h1>Categories <h1>
	  </div>

	  <div class ="card-body">

		  <table class="table table-bordered table-striped">
          <thead>
		    <tr>
	  		  <th> Id </th>
	  		  <th> Name </th>
	  		  <th> Slug </th>
	  		  <th> Description </th>
	  		  <th> Image </th>
	  		  <th> Action</th>
	  	    </tr>
	  	  </thead>
	  	  <tbody>
	  	    @foreach ($categories as $category)

		  	    <tr>
		  	       <td> {{$category->id}}   </td>
		  	       <td> {{$category->name}} </td>
		  	       <td> {{$category->slug}} </td>
		  	       <td> {{$category->description}} </td>
		  	       <td>
		  	       	     <img src="{{ asset('assets/uploads/category/'.$category->image) }}" class="cate-image" alt="">
		  	       </td>
		  	       <td>
		  	         <a href= "{{ url('/edit-category/'.$category->id) }}" class ="btn btn-primary">Edit </a>
		  	         <a href= "{{ url('/delete-category/'.$category->id) }}" class ="btn btn-danger">Delete </a>

		  	       </td>
		  	    </tr>

		    @endforeach
		 </tbody>
		 </table>
	  </div>


	</div>

@endsection
