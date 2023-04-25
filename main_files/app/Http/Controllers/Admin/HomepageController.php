<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use Image;
use File;

class HomepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function why_choose_us(){
        $homepage = Homepage::first();
        $why_choose_us = (object) array(
            'title1' => $homepage->why_choose_title1,
            'title2' => $homepage->why_choose_title2,
            'image1' => $homepage->why_choose_image1,
            'image2' => $homepage->why_choose_image2,
            'image3' => $homepage->why_choose_image3,
            'why_choose_description' => $homepage->why_choose_description,
            'home1_background' => $homepage->why_choose_home1_background,
            'why_choose_link' => $homepage->why_choose_link,

            'item_icon1' => $homepage->why_choose_item1_icon,
            'item_title1' => $homepage->why_choose_item1_title,
            'item_description1' => $homepage->why_choose_item1_description,

            'item_icon2' => $homepage->why_choose_item2_icon,
            'item_title2' => $homepage->why_choose_item2_title,
            'item_description2' => $homepage->why_choose_item2_description,

            'item_icon3' => $homepage->why_choose_item3_icon,
            'item_title3' => $homepage->why_choose_item3_title,
            'item_description3' => $homepage->why_choose_item3_description,

        );

        return view('admin.why_choose_us', compact('why_choose_us'));
    }

    public function why_choose_us_update(Request $request){
        $rules = [
            'title1' => 'required',
            'title2' => 'required',
            'description' => 'required',
            'why_choose_link' => 'required',
        ];
        $customMessages = [
            'title1.required' => trans('admin_validation.Title is required'),
            'title2.required' => trans('admin_validation.Title is required'),
            'description.required' => trans('admin_validation.Description is required'),
            'why_choose_link.required' => trans('admin_validation.Link is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $homepage = Homepage::first();

        if($request->home1_background){
            $existing_image = $homepage->why_choose_home1_background;
            $extention = $request->home1_background->getClientOriginalExtension();
            $image_name = 'why-choose-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $slider_image = 'uploads/website-images/'.$image_name;
            Image::make($request->home1_background)
                ->save(public_path().'/'.$slider_image);
            $homepage->why_choose_home1_background = $slider_image;
            $homepage->save();
            if($existing_image){
                if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
            }
        }

        if($request->image1){
            $existing_image = $homepage->why_choose_image1;
            $extention = $request->image1->getClientOriginalExtension();
            $image_name = 'why-choose-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $slider_image = 'uploads/website-images/'.$image_name;
            Image::make($request->image1)
                ->save(public_path().'/'.$slider_image);
            $homepage->why_choose_image1 = $slider_image;
            $homepage->save();
            if($existing_image){
                if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
            }
        }

        if($request->image2){
            $existing_image = $homepage->why_choose_image2;
            $extention = $request->image2->getClientOriginalExtension();
            $image_name = 'why-choose-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $slider_image = 'uploads/website-images/'.$image_name;
            Image::make($request->image2)
                ->save(public_path().'/'.$slider_image);
            $homepage->why_choose_image2 = $slider_image;
            $homepage->save();
            if($existing_image){
                if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
            }
        }

        if($request->image3){
            $existing_image = $homepage->why_choose_image3;
            $extention = $request->image3->getClientOriginalExtension();
            $image_name = 'why-choose-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $slider_image = 'uploads/website-images/'.$image_name;
            Image::make($request->image3)
                ->save(public_path().'/'.$slider_image);
            $homepage->why_choose_image3 = $slider_image;
            $homepage->save();
            if($existing_image){
                if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
            }
        }

        $homepage->why_choose_title1 = $request->title1;
        $homepage->why_choose_title2 = $request->title2;
        $homepage->why_choose_description = $request->description;
        $homepage->why_choose_link = $request->why_choose_link;
        $homepage->why_choose_item1_icon = $request->item_icon1;
        $homepage->why_choose_item1_title = $request->item_title1;
        $homepage->why_choose_item1_description = $request->item_description1;
        $homepage->why_choose_item2_icon = $request->item_icon2;
        $homepage->why_choose_item2_title = $request->item_title2;
        $homepage->why_choose_item2_description = $request->item_description2;
        $homepage->why_choose_item3_icon = $request->item_icon3;
        $homepage->why_choose_item3_title = $request->item_title3;
        $homepage->why_choose_item3_description = $request->item_description3;
        $homepage->save();

        $notification= trans('admin_validation.Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function how_it_work(){
        $homepage = Homepage::first();
        $how_it_work = (object) array(
            'title1' => $homepage->how_it_work_title1,
            'title2' => $homepage->how_it_work_title2,
            'description' => $homepage->how_it_work_description,
            'image' => $homepage->how_it_work_image,
            'link' => $homepage->how_it_work_link,
            'video_id' => $homepage->how_it_work_video_id,
        );


        return view('admin.how_it_work', compact('how_it_work'));
    }

    public function how_it_work_update(Request $request){
        $rules = [
            'title1' => 'required',
            'title2' => 'required',
            'description' => 'required',
            'link' => 'required',
            'video_id' => 'required',
        ];
        $customMessages = [
            'title1.required' => trans('admin_validation.Title is required'),
            'title2.required' => trans('admin_validation.Title is required'),
            'description.required' => trans('admin_validation.Description is required'),
            'video_id.required' => trans('admin_validation.Video id is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $homepage = Homepage::first();

        if($request->image){
            $existing_image = $homepage->how_it_work_image;
            $extention = $request->image->getClientOriginalExtension();
            $image_name = 'how-it-work'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $slider_image = 'uploads/website-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$slider_image);
            $homepage->how_it_work_image = $slider_image;
            $homepage->save();
            if($existing_image){
                if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
            }
        }

        $homepage->how_it_work_title1 = $request->title1;
        $homepage->how_it_work_title2 = $request->title2;
        $homepage->how_it_work_description = $request->description;
        $homepage->how_it_work_link = $request->link;
        $homepage->how_it_work_video_id = $request->video_id;
        $homepage->save();

        $notification= trans('admin_validation.Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
