<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::where('status','0')->get();
    	
    	return view('admin.orders.index',compact('orders'));
    }

    public function view($id)
    {
    	$order = Order::where('id',$id)->first();
        return view('admin.orders.view',compact('order'));	
    }

    public function updateorder(Request $request,$id)
    {
    	$order = Order::find($id);
                
        $order->status = $request->input('order_status');
                       
        $order->update();
        return redirect('orders')->with('status',"Order updated successfully");
    }

    public function orderhistory()
    {
    	$orders = Order::where('status','1')->get();
    	
    	return view('admin.orders.history',compact('orders'));
    }
}
