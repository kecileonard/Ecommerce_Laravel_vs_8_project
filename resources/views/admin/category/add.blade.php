@extends('layouts.admin')

@section('content')

	<div class='card'>
	 <div class ="card-body">
	 <h4>'Add category'</h4>
	 </div>	
	  <div class ="card-body">
	    <form action = "{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        	<div class="col-md-6">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" id="name">
        	</div>

        	<div class="col-md-6">
              <label for="">Slug</label>
              <input type="text" class="form-control" name="slug" id="slug">
        	</div>

        	<div class="col-md-12">
              <label for="">Description</label>
              <textarea rows= "3" class="form-control" name="description" id="description"></textarea>
        	</div>

        	<div class="col-md-6">
              <label for="">Status</label>
              <input type="checkbox" class="form-control" name="status" id="status">
        	</div>

        	<div class="col-md-6">
              <label for="">Popular</label>
              <input type="checkbox" class="form-control" name="popular" id="popular">
        	</div>

        	<div class="col-md-12">
              <label for="">Meta title</label>
              <input type="text" class="form-control" name="meta_title" id="meta_title">
        	</div>

        	
        	<div class="col-md-12">
              <label for="">Meta keywords</label>
              <textarea rows= "3" class="form-control" name="meta_keywords" id="meta_keywords"></textarea>
        	</div>

        	<div class="col-md-12">
              <label for="">Meta description</label>
              <textarea rows= "3" class="form-control" name="meta_description" id="meta_description"></textarea>
        	</div>

        	<div class="col-md-12">              
              <input type="file" name="image" class="form-control">
        	</div>

        	<div class="col-md-12">
              
              <button type="submit" name="image" class="btn btn-primary"> Submit </button>
          	</div>

        </div>	    
	    </form>	
	  </div>

	</div>

@endsection