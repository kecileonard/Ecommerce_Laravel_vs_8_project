<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
    	$wishlists = Wishlist::where('user_id',Auth::id())->get();

    	return view('frontend.wishlist',compact('wishlists'));
    }

    public function add(Request $request)
    {

        $product_id=$request->input('product_id');

        if (Auth::check())
        {
        	$prod_check = Product::where('id',$product_id)->first();
           

        	if($prod_check)
        	{
               if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
               {
                   return response()->json(['status'=>$prod_check->name." Alredy added to list"]);
               }
               else
               {
                  $cartItem= new Wishlist();
                  $cartItem->prod_id =  $product_id;
                  $cartItem->user_id = Auth::id();
                  $cartItem->save();
                  return response()->json(['status'=>$prod_check->name." Added to list"]);
               }

        	}else
        	{
        		return response()->json(['status'=>"Product does not exist"]);
        	}
        }
        else
        {
        	return response()->json(['status'=>"Login to continue"]);
        }

    }

    public function deleteitem(Request $request)
    {

        if (Auth::check())
        {
        	$product_id = $request->input('prod_id');


        	if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
            {

                   $wishlist = Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                   $wishlist->delete();
                   return response()->json(['status'=>"Item removed from wishlist successfully "]);
            }

    	}
    	else
        {
        	return response()->json(['status'=>"Login to continue"]);
        }
    }

    public function wishlistcount()
    {
       $wishlist_count = Wishlist::where('user_id', Auth::id())->count();
       return response()->json(['count'=>$wishlist_count]);

    }
}
