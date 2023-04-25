<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Setting;
use Image;
use File;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $slider = Slider::first();

        return view('admin.create_slider', compact('slider'));
    }

    public function update(Request $request, $id){
        $rules = [
            'home1_title' => 'required',
            'home1_description' => 'required',
            'button_link' => 'required'
        ];
        $customMessages = [
            'home1_title.required' => trans('admin_validation.Title is required'),
            'home1_description.required' => trans('admin_validation.Description is required'),
            'button_link.required' => trans('admin_validation.Link is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $slider = Slider::find($id);

        if($request->home1_image){
            $existing_slider = $slider->home1_image;
            $extention = $request->home1_image->getClientOriginalExtension();
            $slider_image = 'slider'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $slider_image = 'uploads/website-images/'.$slider_image;
            Image::make($request->home1_image)
                ->save(public_path().'/'.$slider_image);
            $slider->home1_image = $slider_image;
            $slider->save();
            if($existing_slider){
                if(File::exists(public_path().'/'.$existing_slider))unlink(public_path().'/'.$existing_slider);
            }
        }


        $slider->home1_title = $request->home1_title;
        $slider->home1_description = $request->home1_description;
        $slider->button_link = $request->button_link;
        $slider->save();

        $notification= trans('admin_validation.Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
