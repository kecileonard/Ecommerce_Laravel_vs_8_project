@extends('layouts.admin')

@section('content')

	<div class='card'>
	 <div class ="card-body">
	 <h4>'Edit category'</h4>
	 </div>	
	  <div class ="card-body">
	    <form action = "{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        	<div class="col-md-6">
              <label for="">Name</label>
              <input type="text" value="{{ $category->name}}" class="form-control" name="name" id="name">
        	</div>

        	<div class="col-md-6">
              <label for="">Slug</label>
              <input type="text" value="{{ $category->slug}}"class="form-control" name="slug" id="slug">
        	</div>

        	<div class="col-md-12">
              <label for="">Description</label>
              <textarea rows= "3" class="form-control"  name="description" id="description">{{ $category->description}}</textarea>
        	</div>

        	<div class="col-md-6">
              <label for="">Status</label>
              <input type="checkbox" class="form-control" {{ $category->status == 1 ?  'checked':''}} name="status" id="status">
        	</div>

        	<div class="col-md-6">
              <label for="">Popular</label>
              <input type="checkbox" class="form-control" {{ $category->popular == 1 ? 'checked':''}} name="popular" id="popular">
        	</div>

        	<div class="col-md-12">
              <label for="">Meta title</label>
              <input type="text" class="form-control" value="{{ $category->meta_title}}" name="meta_title" id="meta_title">
        	</div>

        	
        	<div class="col-md-12">
              <label for="">Meta keywords</label>
              <textarea rows= "3" class="form-control" name="meta_keywords" id="meta_keywords">{{$category->meta_keywords}}</textarea>
        	</div>

        	<div class="col-md-12">
              <label for="">Meta description</label>
              <textarea rows= "3" class="form-control" name="meta_description" id="meta_description">{{$category->meta_descrip}}</textarea>
        	</div>
          
          <div class="col-md-12"> 
          @if($category->image)
             <img src="{{asset('assets/uploads/category/'.$category->image)}}" class="cate-image" alt="Category image">          
          @endif
        	             
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