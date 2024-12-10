@extends('layouts.admin')

@section('content')

	<div class='card'>
	 <div class ="card-body">
	 <h4>Add product</h4>
	 </div>
	  <div class ="card-body">
	    <form action = "{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

          <div class="col-md-12 mb-3">

              <select class="form-select" name="category_id" >
                  <option value="" >Select a category </option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}" >{{$category->name}} </option>
                  @endforeach
              </select>

          </div>

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

          <div class="col-md-12">
              <label for="">Small description</label>
              <textarea rows= "3" class="form-control" name="small_description" id="small_description"></textarea>
          </div>


          <div class="col-md-6">
              <label for="">Status</label>
              <input type="checkbox"  name="status" id="status">
        	</div>

        	<div class="col-md-6">
              <label for="">Trending</label>
              <input type="checkbox" name="trending" id="trending">
        	</div>

          <div class="col-md-6">
              <label for="">Quantity</label>
              <input type="number"  class="form-control" name="qty" id="qty">
          </div>

          <div class="col-md-6">
              <label for="">Original price </label>
              <input type="number"  class="form-control" name="original_price" id="original_price">
          </div>

          <div class="col-md-6">
              <label for="">Selling price</label>
              <input type="number"  class="form-control" name="selling_price" id="selling_price">
          </div>

          <div class="col-md-6">
              <label for="">Tax</label>
              <input type="number"  class="form-control" name="tax" id="tax">
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
