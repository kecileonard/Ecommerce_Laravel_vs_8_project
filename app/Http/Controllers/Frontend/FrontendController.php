<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    public function index()
    {
    	
      $featured_products=Product::where('trending','1')->take('15')->get();
      $trending_categories=Category::where('popular','1')->take('15')->get();
      $related_categories=Category::where('popular','0')->take('15')->get();
    	return view('frontend.index',compact('featured_products','trending_categories' ,'related_categories'));
    }

    public function category()
    {
    	$categories=Category::where('status','0')->get();
    	return view('frontend.category',compact('categories'));
    }

    public function viewcategory($slug)
    {
    	if(Category::where('slug',$slug)->exists())
    	{
    	  $category=Category::where('slug',$slug)->first();
    	  $products=Product::where('category_id',$category->id)->where('status','0')->get();
    	  return view('frontend.products.index',compact('products','category'));

       }else
       {
         return redirect('/')->with('status',"Slug does not exists");
       }
    }

    public function productview($category_slug, $product_slug)
    {

    	if(Category::where('slug',$category_slug)->exists())
    	{

    	  if(Product::where('slug',$product_slug)->exists())
    	  {

    	      $product = Product::where('slug',$product_slug)->first();
              $ratings = Rating::where('prod_id', $product->id)->get();
              $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
              $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
              $reviews = Review::where('prod_id', $product->id)->get();

              if($ratings->count() > 0)
              {
                $rating_value = $rating_sum / $ratings->count();
              }
              else
              {
                 $rating_value = 0;
              }

    	      return view('frontend.products.view',compact('product','ratings','rating_value','user_rating','reviews'));

    	  }
    	  else
          {
            return redirect('/')->with('status',"Slug does not exists");
          }


       }
       else
       {
         return redirect('/')->with('status',"Slug does not exists");
       }
    }

    public function productlistAjax()
    {
        $products = Product::select('name')->where('status','0')->get();
        $data = [];

        foreach ($products as $item)
        {
            $data[] = $item['name'];

        }
        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;

        if ($searched_product !="")
        {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if ($product)
            {
                return redirect('category/'. $product->category->slug.'/'. $product->slug);
            }
            else
            {
                return redirect()->back()->with("status","No products matched your search");
            }
        }
        else
        {
            return redirect()-back();
        }

    }
}
