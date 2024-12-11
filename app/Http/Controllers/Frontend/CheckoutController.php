<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index()
    {

    	$old_cartitems = Cart::where('user_id',Auth::id())->get();

    	foreach( $old_cartitems as $item )
        {

            if(!Product::where('id', $item->prod_id)->where('qty','>=', $item->prod_qty )->exists())
            {

                //dd($item->prod_id , $item->prod_qty);

                $removeitem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)
                ->first();
                $removeitem->delete();
            }
        }


        $cartitems = Cart::where('user_id',Auth::id())->get();

    	return view('frontend.checkout',compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        /* 
    	$order = new Order();
    	$order->user_id=Auth::id();
        $order->fname=$request->fname;
        $order->lname=$request->lname;
        $order->phone=$request->phone;
        $order->email=$request->inputemail;
        $order->address1=$requesinputt->address1;
        $order->address2=$requesinputt->address2;
        $order->city=$request->cinputity;
        $order->country=$requestinput->country;
        $order->state=$request->inputstate;
        $order->pincode=$requestinput->pincode;
        $order->tracking_no='shainputrma'.rand(1111,9999);
        */
        $order = new Order();
    	$order->user_id=Auth::id();
        $order->fname=$request->input("fname");
        $order->lname=$request->input("lname");
        $order->phone=$request->input("phone");
        $order->email=$request->input("email");
        $order->address1=$request->input("address1");
        $order->address2=$request->input("address2");
        $order->city=$request->input("city");
        $order->country=$request->input("country");
        $order->state=$request->input("state");
        $order->pincode=$request->input("pincode");
        $order->tracking_no='sharma'.rand(1111,9999);
        $order->payment_mode=$request->input("payment_mode");
        $order->payment_id=$request->input("payment_id");
        
        
        
        //To calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $item )
        {
             //$total += $item->products->selling_price;
            $total += $item->products->selling_price * $item->prod_qty;
        }

        $order->total_price = $total;
        $order->tracking_no='leo'.rand(1111,9999);
        $order->save();

        $order->id;

        $cartitems = Cart::where('user_id',Auth::id())->get();

        foreach($cartitems as $item )
        {
               OrderItem::create([
               	'order_id'=> $order->id,
               	'prod_id' => $item->prod_id,
               	'qty'=> $item->prod_qty,
               	'price'=> $item->products->selling_price,

                ]);

                $prod = Product::where('id',$item->prod_id)->first();
                $prod->qty = $prod->qty - $item->prod_qty;
                $prod->update();
        }

        if(Auth::user()->address1 == NULL)
        {
           $user = User::where('id',Auth::id())->first();

           $user->name=$request->input('fname');
           $user->lname=$request->input('lname');
           $user->phone=$request->input('phone');
           $user->address1=$request->input('address1');
           $user->address2=$request->input('address2');
           $user->city=$request->input('city');
           $user->country=$request->input('country');
           $user->state=$request->input('state');
           $user->pincode=$request->input('pincode');
           $user->update();
        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        if ($request->input("payment_mode")=="Paid by Razorpay" || $request->input("payment_mode")=="Paid by Paypal") 
        {
            return response()->json(["status"=>"Order placed successfully"]);

        }
    	return redirect('/')->with('status',"Order placed Successfully");
    }

    public function razorpaycheck(Request $request)
    {

        $cartitems = Cart::where('user_id',Auth::id())->get();
        $total_price = 0;
        foreach ($cartitems as $item)
        {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }

        $firstname = $request->input('firstname');
        $lastname  = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input( 'city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');

        return response()->json([
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'pincode' => $pincode,
            'total_price' => $total_price
        ]);

    }


}
