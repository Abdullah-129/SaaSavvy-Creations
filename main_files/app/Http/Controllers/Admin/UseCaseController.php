<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UseCase;
use App\Models\SubUseCase;

class UseCaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $use_cases = UseCase::all();

        return view('admin.use_case', compact('use_cases'));
    }

    public function edit($id){
        $use_case = UseCase::find($id);
        $sub_use_cases = SubUseCase::where('use_case_id', $id)->get();

        return view('admin.use_case_edit', compact('use_case','sub_use_cases'));
    }

    public function update(Request $request ,$id){

        $rules = [
            'icon'=>'required',
            'title'=>'required',
            'description'=>'required'
        ];

        $customMessages = [
            'icon.required' => trans('admin_validation.Icon is required'),
            'title.required' => trans('admin_validation.Title is required'),
            'description.required' => trans('admin_validation.Description is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $use_case = UseCase::find($id);
        $use_case->icon = $request->icon;
        $use_case->title = $request->title;
        $use_case->description = $request->description;
        $use_case->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function update_sub_usecase(Request $request){

        foreach($request->sub_use_case_ids as $index => $sub_use_case_id){
            $sub_use_case = SubUseCase::find($request->sub_use_case_ids[$index]);
            $sub_use_case->sub_use_case = $request->sub_use_cases[$index];
            $sub_use_case->save();
        }

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
