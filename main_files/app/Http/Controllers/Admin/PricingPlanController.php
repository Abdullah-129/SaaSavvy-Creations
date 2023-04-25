<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricingPlan;
use App\Models\Order;
class PricingPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $pricing_plans = PricingPlan::all();
        return view('admin.pricing_plan', compact('pricing_plans'));
    }

    public function create(){
        return view('admin.pricing_plan_create');
    }

    public function store(Request $request){
        $rules = [
            'plan_name'=>'required',
            'plan_price'=>'required|numeric',
            'expiration_day'=>'required|numeric',
            'maximum_keyword_generate'=>'required',
            'enable_image_search'=>'required',
            'status'=>'required',
            'serial'=>'required',
        ];

        $customMessages = [
            'plan_name.required' => trans('admin_validation.Plan name is required'),
            'plan_price.required' => trans('admin_validation.Price is required'),
            'expiration_day.required' => trans('admin_validation.Expiration day is required'),
            'maximum_keyword_generate.required' => trans('admin_validation.Keyword generate is required'),
            'enable_image_search.required' => trans('admin_validation.Enable image is required'),
            'status.required' => trans('admin_validation.Status is required'),
            'serial.required' => trans('admin_validation.Serial is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $package = new PricingPlan();
        $package->plan_name = $request->plan_name;
        $package->plan_slug = date('Ymdhis');
        $package->plan_price = $request->plan_price;
        $package->expiration_day = $request->expiration_day;
        $package->maximum_keyword_generate = $request->maximum_keyword_generate;
        $package->enable_image_search = $request->enable_image_search;
        $package->enable_custom_search = $request->enable_custom_search;
        $package->status = $request->status;
        $package->serial = $request->serial;
        $package->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.pricing-plan.index')->with($notification);
    }

    public function edit($id){
        $pricing_plan = PricingPlan::find($id);
        return view('admin.pricing_plan_edit', compact('pricing_plan'));
    }

    public function update(Request $request, $id){
        $rules = [
            'plan_name'=>'required',
            'plan_price'=>'required|numeric',
            'expiration_day'=>'required|numeric',
            'maximum_keyword_generate'=>'required',
            'enable_image_search'=>'required',
            'status'=>'required',
            'serial'=>'required',
        ];

        $customMessages = [
            'plan_name.required' => trans('admin_validation.Plan name is required'),
            'plan_price.required' => trans('admin_validation.Price is required'),
            'expiration_day.required' => trans('admin_validation.Expiration day is required'),
            'maximum_keyword_generate.required' => trans('admin_validation.Keyword generate is required'),
            'enable_image_search.required' => trans('admin_validation.Enable image is required'),
            'status.required' => trans('admin_validation.Status is required'),
            'serial.required' => trans('admin_validation.Serial is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $package = PricingPlan::find($id);
        $package->plan_name = $request->plan_name;
        $package->plan_price = $request->plan_price;
        $package->expiration_day = $request->expiration_day;
        $package->maximum_keyword_generate = $request->maximum_keyword_generate;
        $package->enable_image_search = $request->enable_image_search;
        $package->enable_custom_search = $request->enable_custom_search;
        $package->status = $request->status;
        $package->serial = $request->serial;
        $package->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.pricing-plan.index')->with($notification);
    }

    public function destroy($id){
        $exist_order = Order::where('pricing_plan_id', $id)->count();
        if($exist_order == 0){
            $package = PricingPlan::find($id);
            $package->delete();

            $notification = trans('admin_validation.Deleted Successfully');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('admin.pricing-plan.index')->with($notification);
        }else{

            $notification = trans('admin_validation.You can not delete this item. There are multiple order created under this plan');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('admin.pricing-plan.index')->with($notification);
        }


    }

}
