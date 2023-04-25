<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\BecomeAuthor;
use Illuminate\Http\Request;
use Image;
use File;
class AboutUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $about = AboutUs::first();

        return view('admin.about-us',compact('about'));
    }

    public function update_aboutUs(Request $request){
        $rules = [
            'header1' => 'required',
            'header2' => 'required',
            'about_us' => 'required',
        ];
        $customMessages = [
            'header1.required' => trans('admin_validation.Header is required'),
            'header2.required' => trans('admin_validation.Header is required'),
            'about_us.required' => trans('admin_validation.About us is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $about = AboutUs::first();
        $about->header1 = $request->header1;
        $about->header2 = $request->header2;
        $about->about_us = $request->about_us;
        $about->item1_title = $request->item1_title;
        $about->item2_title = $request->item2_title;
        $about->item3_title = $request->item3_title;
        $about->item1_qty = $request->item1_qty;
        $about->item2_qty = $request->item2_qty;
        $about->item3_qty = $request->item3_qty;
        $about->save();

        if($request->image){
            $exist_banner = $about->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $about->image = $banner_name;
            $about->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        if($request->image2){
            $exist_banner = $about->image2;
            $extention = $request->image2->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image2)
                ->save(public_path().'/'.$banner_name);
            $about->image2 = $banner_name;
            $about->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }



        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
