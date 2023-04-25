<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPage;
use Image;
use File;
class ContactPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $contact = ContactPage::first();
        return view('admin.contact_page', compact('contact'));
    }

    public function update(Request $request, $id){
        $rules = [
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'title' => 'required',
            'google_map' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'email.required' => trans('admin_validation.Email is required'),
            'phone.unique' => trans('admin_validation.Phone is required'),
            'address.unique' => trans('admin_validation.Address is required'),
            'title.unique' => trans('admin_validation.Title is required'),
            'google_map.unique' => trans('admin_validation.Google Map is required'),
            'description.unique' => trans('admin_validation.Description is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $contact = ContactPage::find($id);

        $contact->title = $request->title;
        $contact->description = $request->description;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->map = $request->google_map;
        $contact->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
