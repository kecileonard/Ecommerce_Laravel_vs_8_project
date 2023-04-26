@extends('layouts.admin')

@section('content')

  <div class='card'>
   <div class ="card-body">
   <h4>Edit product</h4>
   </div> 
    <div class ="card-body">
      <form action = "{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          
          <div class="col-md-12 mb-3">
              <label for="">Category </label>
              <!--
              <select class="form-select" name="category_id" >                               
                  <option value="{{ $product->category->name}}" >
                  </option>                  
              </select>
              -->
              <select class="form-select" name="category_id">
                         <option value="{{ $product->category_id }}" > {{$product->category->name}} </option>
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}} </option>
                          @endforeach  
              </select>                             
          </div>

          <div class="col-md-6">
              <label for="">Name</label>
              <input type="text" value="{{ $product->name}}" class="form-control" name="name" id="name">
          </div>

          <div class="col-md-6">
              <label for="">Slug</label>
              <input type="text" class="form-control" value="{{ $product->slug}}" name="slug" id="slug">
          </div>

          <div class="col-md-12">
              <label for="">Description</label>
              <textarea rows= "3" class="form-control" name="description" id="description">{{ $product->description }}</textarea>
          </div>

          <div class="col-md-12">
              <label for="">Small description</label>
              <textarea rows= "3" class="form-control" name="small_description" id="small_description">{{ $product->small_description }}</textarea>
          </div>

          
          <div class="col-md-6">
              <label for="">Status</label>
              <input type="checkbox" {{ $product->status ==1 ? 'checked':'' }} name="status" id="status">
          </div>

          <div class="col-md-6">
              <label for="">Trending</label>
              <input type="checkbox" {{ $product->trending == 1 ? 'checked':''}} name="trending" id="trending">
          </div>

          <div class="col-md-6">
              <label for="">Quantity</label>
              <input type="number"  value="{{ $product->qty }}" class="form-control" name="qty" id="qty">
          </div>

          <div class="col-md-6">
              <label for="">Original price </label>
              <input type="number"  value="{{ $product->original_price }}" class="form-control" name="original_price" id="original_price">
          </div>

          <div class="col-md-6">
              <label for="">Selling price</label>
              <input type="number"  value="{{ $product->selling_price }}" class="form-control" name="selling_price" id="selling_price">
          </div>

          <div class="col-md-6">
              <label for="">Tax</label>
              <input type="number"  value="{{ $product->tax }}" class="form-control" name="tax" id="tax">
          </div>

          <div class="col-md-12">
              <label for="">Meta title</label>
              <input type="text" class="form-control" value="{{ $product->meta_title }}" name="meta_title" id="meta_title">
          </div>

          
          <div class="col-md-12">
              <label for="">Meta keywords</label>
              <textarea rows= "3" class="form-control" name="meta_keywords" id="meta_keywords">{{ $product->meta_keywords }}</textarea>
          </div>

          <div class="col-md-12">
              <label for="">Meta description</label>
              <textarea rows= "3" class="form-control" name="meta_description" id="meta_description">{{ $product->meta_description }}</textarea>
          </div>

          <!--
          <div class="input-group col-md-12">
            <div class="custom-file">                      
               <input type="file" name="image"  value="{{ $product->image }}" class="form-control">
            </div>     
          </div>
          -->
          
          <div class="col-md-12">             
                  <input type="file" class="form-control" name="image"/>
                  <div class="custom-file">
                       @if($product->image)
                         <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="cate-image" alt="Product image">          
                       @endif                    
                  </div>
                  <input type="hidden" name="hidden_image" value="{{ $product->image }}">             
          </div>
                                 


          <div class="col-md-12">              
              <button type="submit" class="btn btn-primary"> Submit </button>
          </div>

        </div>      
      </form> 
    </div>

  </div>

@endsection