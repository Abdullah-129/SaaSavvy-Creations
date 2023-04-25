<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BreadcrumbImage;
use Image;
use File;
class BreadcrumbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $banner_image = BreadcrumbImage::first();


        return view('admin.breadcrumb_image', compact('banner_image'));
    }

    public function update(Request $request, $id){

        $image = BreadcrumbImage::find($id);
        if($request->image){
            $exist_banner = $image->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'banner-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $image->image = $banner_name;
            $image->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        if($request->foreground_image){
            $exist_banner = $image->foreground_image;
            $extention = $request->foreground_image->getClientOriginalExtension();
            $banner_name = 'banner-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->foreground_image)
                ->save(public_path().'/'.$banner_name);
            $image->foreground_image = $banner_name;
            $image->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }



        $notification = 'Updated Successfully';
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
