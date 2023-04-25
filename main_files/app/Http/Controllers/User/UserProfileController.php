<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BreadcrumbImage;
use App\Models\User;
use App\Models\GoogleRecaptcha;
use App\Models\Setting;
use App\Models\Order;
use App\Models\PricingPlan;
use App\Models\AiHistory;
use App\Models\UseCase;

use App\Rules\Captcha;
use Image;
use File;
use Str;
use Hash;
use Slug;
use Auth;
use Session;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function dashboard(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $user = Auth::guard('web')->user();

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);

        $usecases = UseCase::where('status', 1)->get();

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();
        $is_package = false;
        $package_name = '';
        if($payment_history){
            $is_package = true;
            $package_name = $payment_history->pricing_plan->plan_name;
            $left_word = $payment_history->maximum_keyword_generate - $user->total_word;
        }else{
            $left_word = 0;
        }

        return view('user.dashboard', compact('breadcrumb','user','default_avatar','usecases','left_word','is_package','package_name','payment_history'));
    }

    public function change_password(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $user = Auth::guard('web')->user();

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();
        $is_package = false;
        $package_name = '';
        if($payment_history){
            $is_package = true;
            $package_name = $payment_history->pricing_plan->plan_name;
            $left_word = $payment_history->maximum_keyword_generate - $user->total_word;
        }else{
            $left_word = 0;
        }

        return view('user.change_password', compact('user', 'breadcrumb', 'default_avatar','left_word','is_package','package_name'));
    }

    public function updatePassword(Request $request){
        $rules = [
            'current_password'=>'required',
            'password'=>'required|min:4|confirmed',
        ];
        $customMessages = [
            'current_password.required' => trans('user_validation.Current password is required'),
            'password.required' => trans('user_validation.Password is required'),
            'password.min' => trans('user_validation.Password minimum 4 character'),
            'password.confirmed' => trans('user_validation.Confirm password does not match'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = Auth::guard('web')->user();
        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = 'Password change successfully';
            $notification=array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);

        }else{
            $notification = trans('user_validation.Current password does not match');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }



    public function my_profile(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $user = Auth::guard('web')->user();

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();
        $is_package = false;
        $package_name = '';
        if($payment_history){
            $is_package = true;
            $package_name = $payment_history->pricing_plan->plan_name;
            $left_word = $payment_history->maximum_keyword_generate - $user->total_word;
        }else{
            $left_word = 0;
        }

        return view('user.my_profile', compact('user', 'breadcrumb', 'default_avatar','left_word','is_package','package_name'));
    }

    public function updateProfile(Request $request){
        $user = Auth::guard('web')->user();
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$user->id,
            'phone'=>'required',
            'address'=>'required',
        ];
        $customMessages = [
            'name.required' => trans('user_validation.Name is required'),
            'email.required' => trans('user_validation.Email is required'),
            'email.unique' => trans('user_validation.Email already exist'),
            'phone.required' => trans('user_validation.Phone is required'),
            'address.required' => trans('user_validation.Address is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        if($request->file('image')){
            $old_image=$user->image;
            $user_image=$request->image;
            $extention=$user_image->getClientOriginalExtension();
            $image_name= Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name='uploads/custom-images/'.$image_name;

            Image::make($user_image)
                ->save(public_path().'/'.$image_name);

            $user->image=$image_name;
            $user->save();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

        }


        $notification = trans('user_validation.Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
    }


    public function pricing_plan(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $user = Auth::guard('web')->user();

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);
        $pricing_plans = PricingPlan::where('status', 1)->orderBy('serial','asc')->get();
        $currency_icon = (object) array('icon' => $setting->currency_icon);

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();
        $is_package = false;
        $package_name = '';
        if($payment_history){
            $is_package = true;
            $package_name = $payment_history->pricing_plan->plan_name;
            $left_word = $payment_history->maximum_keyword_generate - $user->total_word;
        }else{
            $left_word = 0;
        }

        return view('user.pricing_plan', compact('user', 'breadcrumb', 'default_avatar','currency_icon', 'pricing_plans','left_word','is_package','package_name'));
    }


    public function payment_history(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $user = Auth::guard('web')->user();

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);
        $currency_icon = (object) array('icon' => $setting->currency_icon);
        $payment_histories = Order::where('user_id', $user->id)->orderBy('id','desc')->get();

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();
        $is_package = false;
        $package_name = '';
        if($payment_history){
            $is_package = true;
            $package_name = $payment_history->pricing_plan->plan_name;
            $left_word = $payment_history->maximum_keyword_generate - $user->total_word;
        }else{
            $left_word = 0;
        }

        return view('user.payment_history', compact('user', 'breadcrumb', 'default_avatar','currency_icon','payment_histories','left_word','is_package','package_name'));
    }

    public function ai_history(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $user = Auth::guard('web')->user();

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);
        $currency_icon = (object) array('icon' => $setting->currency_icon);
        $ai_histories = AiHistory::where('user_id', $user->id)->orderBy('id','desc')->paginate(15);

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();
        $is_package = false;
        $package_name = '';
        if($payment_history){
            $is_package = true;
            $package_name = $payment_history->pricing_plan->plan_name;
            $left_word = $payment_history->maximum_keyword_generate - $user->total_word;
        }else{
            $left_word = 0;
        }

        return view('user.ai_history', compact('user', 'breadcrumb', 'default_avatar','currency_icon','ai_histories','left_word','is_package','package_name'));
    }

    public function update_ai_history(Request $request, $id){
        $ai_history = AiHistory::find($id);
        $ai_history->title = $request->title;
        $ai_history->ai_content = $request->ai_content;
        $ai_history->is_edit = 1;
        $ai_history->save();

        $notification = trans('user_validation.Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function delete_ai_document($id){
        $ai_history = AiHistory::find($id);
        $ai_history->delete();

        $notification = trans('user_validation.Deleted Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function single_ai_document($id){
        $ai_history = AiHistory::find($id);

        return view('user.single_ai_document', compact('ai_history'));

    }








}
