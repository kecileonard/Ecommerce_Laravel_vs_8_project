<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('admin.product.index',compact('products'));
    }

    public function add()
    {
    	$categories = Category::all();
    	return view('admin.product.add',compact('categories'));
    }

    public function insert(Request $request)
    {
    	$product =new Product();

        //if($request->hasFile('image'));
        if ($request->file('image')!=null)
        {
        	$file=$request->file('image');
        	$ext=$file->getClientOriginalExtension();
        	$filename=time().'.'.$ext;
        	$file->move('assets/uploads/product/',$filename);
        	$product->image=$filename;
        }
        $product->category_id=$request->input('category_id');
        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');
        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->qty=$request->input('qty');
        $product->tax=$request->input('tax');
        $product->status=$request->input('status') == TRUE?'1':'0';
        $product->trending=$request->input('trending') == TRUE?'1':'0';  
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');

        $product->save();
        return redirect('/products')->with('status',"Product created successfully");

    }

    public function edit($id)
    {
    	$categories = Category::all();
    	$product = Product::find($id);
    	return view('admin.product.edit',compact('product','categories'));
    }

    public function update(Request $request ,$id)
    {
    	$product = Product::find($id);

    	//dd($request->all());
    	 
        //if($request->hasFile('image'));
        if ($request->file('image')!=null)
        {
        	
        	$path='assets/uploads/product/'.$product->image;

        	if(File::exists($path))
        	{
        	  File::delete($path);        	  
        	}

        	$file=$request->file('image');
        	$ext=$file->getClientOriginalExtension();
        	$filename=time().'.'.$ext;
        	$file->move('assets/uploads/product/',$filename);
        	$product->image=$filename;        	
        }

        $product->category_id=$request->input('category_id');
        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');
        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->qty=$request->input('qty');
        $product->tax=$request->input('tax');
        $product->status=$request->input('status') == TRUE?'1':'0';
        $product->trending=$request->input('trending') == TRUE?'1':'0';  
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');

        
        $product->update();
        return redirect('/products')->with('status',"Product updated successfully");

    }

    public function destroy($id)
    {
    	$product = Product::find($id);
    	if($product->image);
        {
        	$path='assets/uploads/product/'.$product->image;
        	if(File::exists($path))
        	{
        	  File::delete($path);        	  
        	}        	
        }

    	$product->delete();
    	return redirect('/products')->with('status',"Product deleted successfully");
    }
}
