<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {

        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');

        if (Auth::check())
        {
        	$prod_check = Product::where('id',$product_id)->first();

        	if($prod_check)
        	{
               if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
               {
                   return response()->json(['status'=>$prod_check->name." Already added to Cart"]);
               }
               else
               {
                  $cartItem= new Cart();
                  $cartItem->prod_id =  $product_id;
                  $cartItem->prod_qty = $product_qty;
                  $cartItem->user_id = Auth::id();
                  $cartItem->save();
                  return response()->json(['status'=>$prod_check->name." Added to Cart"]);
               }

        	}
        }
        else
        {
        	return response()->json(['status'=>"Login to continue"]);
        }

    }

    public function viewcart()
    {
    	$cartitems = Cart::where('user_id',Auth::id())->get();
    	return view('frontend.cart',compact('cartitems'));
    }

    public function updatecart(Request $request)
    {

        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        //var_dump("prod qty",$product_qty);

        //die();

        if (Auth::check())
        {

               if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
               {
                   $cart=Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                   $cart->prod_qty = $product_qty;
                   $cart->update();
                   //var_dump("prod qty after",$product_qty);
                   //die();
                   return response()->json(['status'=>"Quantity updated"]);
               }

        }
        else
        {
        	return response()->json(['status'=>"Login to continue"]);
        }

    }

    public function deleteproduct(Request $request)
    {

        if (Auth::check())
        {
        	$product_id = $request->input('prod_id');


        	if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
            {

                   $cartitem = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                   $cartitem->delete();
                   return response()->json(['status'=>"deleted successfully "]);
            }

    	}
    	else
        {
        	return response()->json(['status'=>"Login to continue"]);
        }
    }

    public function cartcount()
    {
       $cart_count = Cart::where('user_id', Auth::id())->count();
       return response()->json(['count'=>$cart_count]);

    }

}
