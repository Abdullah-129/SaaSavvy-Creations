<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Models\Blog;
use App\Models\Subscriber;
use App\Models\Admin;


use DB;
use Schema;
use File;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashobard(){

        // $table_columns = ['image', 'image2', 'foreground_image' , 'supporter_image', 'logo', 'payment_image', 'why_choose_image1', 'why_choose_image2', 'why_choose_image3', 'why_choose_home1_background', 'how_it_work_image', 'mollie_image', 'paystack_image' , 'favicon', 'footer_logo' , 'home1_image'];
        // $tables = DB::select('SHOW TABLES');
        // $images = [];
        // foreach ($tables as $key => $tbl) {
        //     $table = $tbl->Tables_in_open_ai;
        //     $collection = DB::table($table)->get()->all();
        //     foreach ($collection as $key => $value) {
        //         foreach ($table_columns as $key => $col) {
        //             if (Schema::hasColumn($table, $col)) {
        //                 $images[] = $value->$col;
        //             }
        //         }
        //     }
        // }

        // foreach ($images as $key => $image) {
        //     if($image!=null){
        //         if(File::exists(public_path($image))){
        //             rename(public_path($image), public_path('ext/'.$image));
        //         };
        //     }
        // }

        // dd('Image moved to new directory');





        $today_orders = Order::orderBy('id','desc')->whereDay('created_at', now()->day)->get();
        $today_total_earning = $today_orders->where('payment_status',1)->sum('plan_price');


        $monthly_orders = Order::orderBy('id','desc')->whereMonth('created_at', now()->month)->get();
        $monthly_total_earning = $monthly_orders->where('payment_status',1)->sum('plan_price');


        $yearly_orders = Order::orderBy('id','desc')->whereYear('created_at', now()->year)->get();
        $yearly_total_earning = $yearly_orders->where('payment_status',1)->sum('plan_price');


        $total_oders = Order::orderBy('id','desc')->get();
        $total_earning = $total_oders->where('payment_status',1)->sum('plan_price');


        $total_users = User::count();
        $total_blog = Blog::count();
        $total_admin = Admin::count();
        $total_subscriber = Subscriber::where('is_verified',1)->count();


        return view('admin.dashboard', compact('today_orders','today_total_earning','monthly_orders','monthly_total_earning','yearly_orders','yearly_total_earning','total_oders','total_earning','total_users','total_blog','total_subscriber','total_admin'));
    }




}
