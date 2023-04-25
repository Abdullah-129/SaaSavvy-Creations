<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

use Illuminate\Pagination\Paginator;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function purchase_history(Request $request){
        $orders = Order::with('user','pricing_plan')->orderBy('id','desc')->get();

        return view('admin.order', compact('orders'));
    }


    public function single_purchase($id){
        $order = Order::with('user','pricing_plan')->where('order_id',$id)->first();

        return view('admin.show_order',compact('order'));
    }

    public function purchase_delete($id){
        $order = Order::where('id',$id)->first();
        $order->delete();

        $notification = trans('admin_validation.Deleted Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }



}
