<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\City;
use App\Models\Category;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Counter;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\HowItWork;
use App\Models\BreadcrumbImage;
use App\Models\ContactPage;
use App\Models\GoogleRecaptcha;
use App\Models\ContactMessage;
use App\Models\EmailTemplate;
use App\Models\CustomPagination;
use App\Models\PopularPost;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Faq;
use App\Models\TermsAndCondition;
use App\Models\CustomPage;
use App\Models\User;
use App\Models\Review;
use App\Models\Order;
use App\Models\SectionContent;
use App\Models\SectionControl;
use App\Models\Subscriber;
use App\Models\SeoSetting;
use App\Models\Country;
use App\Models\CountryState;
use App\Models\FacebookComment;
use App\Models\Homepage;
use App\Models\UseCase;
use App\Models\PricingPlan;
use App\Rules\Captcha;
use App\Mail\ContactMessageInformation;
use App\Mail\SubscriptionVerification;
use App\Mail\UserRegistration;
use App\Helpers\MailHelper;
use Mail;
use Session;
use Str;
use Auth;
use Hash;
use Image;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $slider = Slider::first();
        $homepage = Homepage::first();
        $how_it_work = (object) array(
            'title1' => $homepage->how_it_work_title1,
            'title2' => $homepage->how_it_work_title2,
            'description' => $homepage->how_it_work_description,
            'image' => $homepage->how_it_work_image,
            'link' => $homepage->how_it_work_link,
            'video_id' => $homepage->how_it_work_video_id,
        );

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

        $use_cases = UseCase::get()->where('status', 1)->take(12);
        $testimonials = Testimonial::where('status', 1)->get()->take(6);;
        $blogs = Blog::where('status', 1)->where('show_homepage', 1)->get()->take(6);

        $seo_setting = SeoSetting::where('id', 1)->first();

        return view('index', compact('slider','how_it_work','why_choose_us','use_cases','testimonials','blogs','seo_setting'));

    }

    public function aboutUs(){
        $seo_setting = SeoSetting::where('id', 2)->first();
        $about = AboutUs::first();
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $testimonials = Testimonial::select('id','name','image','designation','comment','status')->where('status',1)->get()->take(6);

        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->get()->take(3);

        return view('about_us')->with([
            'seo_setting' => $seo_setting,
            'breadcrumb' => $breadcrumb,
            'about' => $about,
            'testimonials' => $testimonials,
            'blogs' => $blogs,
        ]);
    }

    public function contactUs(){
        $contact = ContactPage::first();
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $recaptchaSetting = GoogleRecaptcha::first();

        $seo_setting = SeoSetting::where('id', 3)->first();

        return view('contact_us')->with([
            'seo_setting' => $seo_setting,
            'breadcrumb' => $breadcrumb,
            'contact' => $contact,
            'recaptchaSetting' => $recaptchaSetting,
        ]);
    }

    public function sendContactMessage(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $customMessages = [
            'name.required' => trans('user_validation.Name is required'),
            'email.required' => trans('user_validation.Email is required'),
            'subject.required' => trans('user_validation.Subject is required'),
            'message.required' => trans('user_validation.Message is required'),
        ];
        $this->validate($request, $rules,$customMessages);


        $setting = Setting::first();
        if($setting->enable_save_contact_message == 1){
            $contact = new ContactMessage();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->save();
        }

        MailHelper::setMailConfig();
        $template = EmailTemplate::where('id',2)->first();
        $message = $template->description;
        $subject = $template->subject;
        $message = str_replace('{{name}}',$request->name,$message);
        $message = str_replace('{{email}}',$request->email,$message);
        $message = str_replace('{{phone}}',$request->phone,$message);
        $message = str_replace('{{subject}}',$request->subject,$message);
        $message = str_replace('{{message}}',$request->message,$message);

        Mail::to($setting->contact_email)->send(new ContactMessageInformation($message,$subject));

        $notification = trans('user_validation.Message send successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function blogs(Request $request){
        $seo_setting = SeoSetting::where('id', 6)->first();

        $paginateQty = CustomPagination::whereId('1')->first()->qty;

        $blogs = Blog::select('id','title','image','slug','status','short_description','created_at')->where(['status' => 1])->orderBy('id','desc');

        if($request->search){
            $blogs = $blogs->where('title','LIKE','%'.$request->search.'%')
                            ->orWhere('description','LIKE','%'.$request->search.'%');
        }

        if($request->category){
            $category = BlogCategory::where('slug', $request->category)->first();
            $blogs = $blogs->where('blog_category_id', $category->id);
        }
        $blogs = $blogs->paginate($paginateQty);

        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();

        return view('blog')->with([
            'seo_setting' => $seo_setting,
            'breadcrumb' => $breadcrumb,
            'blogs' => $blogs
        ]);
    }


    public function single_blog($slug){

        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $blog = Blog::with('category')->where('slug', $slug)->first();
        $blog_comments = BlogComment::where(['blog_id' => $blog->id, 'status' => 1])->get();


        $recaptchaSetting = GoogleRecaptcha::first();

        $popularBlogs = PopularPost::select('id','blog_id')->get();
        $popular_arr = array();
        foreach($popularBlogs as $popularBlog){
            $popular_arr[] = $popularBlog->blog_id;
        }
        $popular_blogs = Blog::select('id','title','image','slug','status','created_at')->where(['status' => 1])->orderBy('id','desc')->whereIn('id', $popular_arr)->where('id', '!=', $blog->id)->get()->take(6);

        $categories = BlogCategory::where(['status' => 1])->orderBy('name','asc')->get();

        $facebookComment = FacebookComment::first();

        return view('show_blog')->with([
            'breadcrumb' => $breadcrumb,
            'blog' => $blog,
            'blog_comments' => $blog_comments,
            'recaptchaSetting' => $recaptchaSetting,
            'popular_blogs' => $popular_blogs,
            'categories' => $categories,
            'facebookComment' => $facebookComment,
        ]);
    }

    public function blogComment(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'comment'=>'required',
            'blog_id'=>'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $customMessages = [
            'name.required' => trans('user_validation.Name is required'),
            'email.required' => trans('user_validation.Email is required'),
            'comment.required' => trans('user_validation.Comment is required'),
            'blog_id.required' => trans('user_validation.Blog id is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $comment = new BlogComment();
        $comment->blog_id = $request->blog_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        $notification = trans('user_validation.Blog comment submited successfully');

        return response()->json(['status' => 1, 'message' => $notification]);
    }

    public function faq(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $faqs = Faq::orderBy('id','desc')->where('status',1)->get();

        return view('faq')->with([
            'breadcrumb' => $breadcrumb,
            'faqs' => $faqs
        ]);
    }

    public function testimonial(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $testimonials = Testimonial::where('status',1)->get();
        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->get()->take(6);

        return view('testimonial')->with([
            'breadcrumb' => $breadcrumb,
            'testimonials' => $testimonials,
            'blogs' => $blogs
        ]);
    }

    public function pricing_plan(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();

        $setting = Setting::first();
        $pricing_plans = PricingPlan::where('status', 1)->orderBy('serial','asc')->get();
        $currency_icon = (object) array('icon' => $setting->currency_icon);
        $seo_setting = SeoSetting::where('id', 5)->first();

        return view('pricing_plan')->with([
            'breadcrumb' => $breadcrumb,
            'pricing_plans' => $pricing_plans,
            'currency_icon' => $currency_icon,
            'seo_setting' => $seo_setting,

        ]);
    }





    public function termsAndCondition(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $terms_conditions = TermsAndCondition::first();
        $terms_conditions = $terms_conditions->terms_and_condition;

        return view('terms_and_conditions')->with([
            'breadcrumb' => $breadcrumb,
            'terms_conditions' => $terms_conditions,
        ]);
    }

    public function privacyPolicy(){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $privacyPolicy = TermsAndCondition::first();
        $privacyPolicy = $privacyPolicy->privacy_policy;

        return view('privacy_policy')->with([
            'breadcrumb' => $breadcrumb,
            'privacyPolicy' => $privacyPolicy,
        ]);
    }


    public function customPage($slug){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $page = CustomPage::where(['slug' => $slug, 'status' => 1])->first();

        return view('custom_page')->with([
            'breadcrumb' => $breadcrumb,
            'page' => $page
        ]);
    }



    public function services(Request $request){
        $seo_setting = SeoSetting::where('id', 5)->first();

        $breadcrumb = BreadcrumbImage::where(['id' => 8])->first();

        $service_areas = City::orderBy('name','asc')->select('id','name','slug')->where('status',1)->get();

        $categories = Category::orderBy('name','asc')->select('id','name','slug','icon')->where('status',1)->get();

        $service_pagiante_qty = CustomPagination::whereId('2')->first()->qty;
        $services = Service::with('category','provider')->where(['approve_by_admin' => 1, 'status' => 1, 'is_banned' => 0])->select('id','name','slug','image','price','category_id','provider_id','is_banned','status','approve_by_admin');

        if($request->category){
            $category = Category::where('slug', $request->category)->first();
            if($category){
                $services = $services->where('category_id', $category->id);
            }
        }

        if($request->service_area){
            $services = $services->whereHas('provider', function($query) use ($request){
                $service_area = City::where('slug', $request->service_area)->first();
                if($service_area){
                    $query->where('city_id', $service_area->id);
                }
            });
        }

        if($request->price_range){
            if($request->price_range == 'low_price'){
                $services = $services->orderBy('price','asc');
            }elseif($request->price_range == 'high_price'){
                $services = $services->orderBy('price','desc');
            }else{
                $services = $services->orderBy('id','desc');
            }
        }

        if($request->rating){
            $services->when($request->rating, function ($query) use ($request) {
                $query->wherehas('activeReviews', function ($query) use ($request) {
                    $query->selectRaw('activeReviews.*, avg(rating) as average_rating')
                        ->groupBy('id')
                        ->havingRaw('average_rating = ?', [$request->rating]);
                 });
            });
        }


        if($request->search){
            $services = $services->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('details','LIKE','%'.$request->search.'%');
        }

        if($request->others){
            if($request->others == 'asc'){
                $services = $services->orderBy('name','asc');
            }elseif($request->others == 'desc'){
                $services = $services->orderBy('name','desc');
            }
        }else{
            $services = $services->orderBy('id','desc');
        }

        $services = $services->paginate($service_pagiante_qty);

        $services = $services->appends($request->all());

        $setting = Setting::first();
        $currency_icon = (object) array('icon' => $setting->currency_icon);

        // partner start

        $partner_visbility = false;
        $partner_control = SectionControl::where('id', 41)->first();
        if($partner_control->status == 1){
            $partner_visbility = true;
        }
        $partners = Partner::where(['status' => 1])->get()->take($partner_control->qty);
        // end partner

        $selected_theme = Session::get('selected_theme');
        if ($selected_theme == 'theme_one'){
            $active_theme = 'layout';
        }elseif($selected_theme == 'theme_two'){
            $active_theme = 'layout2';
        }elseif($selected_theme == 'theme_three'){
            $active_theme = 'layout3';
        }else{
            $active_theme = 'layout';
        }

        return view('service')->with([
            'active_theme' => $active_theme,
            'seo_setting' => $seo_setting,
            'breadcrumb' => $breadcrumb,
            'service_areas' => $service_areas,
            'categories' => $categories,
            'services' => $services,
            'currency_icon' => $currency_icon,
            'partner_visbility' => $partner_visbility,
            'partners' => $partners,
        ]);
    }



    public function service($slug){
        $breadcrumb = BreadcrumbImage::where(['id' => 8])->first();
        $service = Service::with('category','provider','activeReviews')->where(['slug' => $slug, 'approve_by_admin' => 1, 'status' => 1, 'is_banned' => 0])->first();

        if(!$service){
            abort(404);
        }

        $days = array(
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        );

        $schedule_list = array();

        foreach($days as $day_item){
            $schedule_item = AppointmentSchedule::where('user_id', $service->provider_id)->where('day', $day_item)->orderBy('start_time','asc')->first();

            if($schedule_item){
                $start_time = strtoupper(date('h:i A', strtotime($schedule_item->start_time)));

                $schedule_item = AppointmentSchedule::where('user_id', $service->provider_id)->where('day', $day_item)->orderBy('end_time','desc')->first();
                $end_time = strtoupper(date('h:i A', strtotime($schedule_item->end_time)));

                $schedule = array(
                    'day' => $day_item,
                    'start_time' => $start_time,
                    'end_time' => $end_time
                );

                $schedule_list[] = $schedule;
            }
        }

        $what_you_will_get = array();
        if($service->what_you_will_provide){
            $provides = json_decode($service->what_you_will_provide);
            foreach($provides as $provide){
                $what_you_will_get [] = $provide;
            }
        }

        $benifits = array();
        if($service->benifit){
            $exist_benifits = json_decode($service->benifit);
            foreach($exist_benifits as $exist_benifit){
                $benifits [] = $exist_benifit;
            }
        }

        $review_pagiante_qty = CustomPagination::whereId('5')->first()->qty;

        $reviews = Review::with('user')->where(['provider_id' =>  $service->provider_id, 'status' => 1,'service_id' => $service->id])->paginate($review_pagiante_qty);

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);
        $currency_icon = (object) array('icon' => $setting->currency_icon);

        $package_features = array();
        if($service->package_features){
            $features = json_decode($service->package_features);
            foreach($features as $feature){
                $package_features [] = $feature;
            }
        }

        $provider = $service->provider;

        $complete_order = Order::where('order_status','complete')->where('provider_id', $provider->id)->count();

        $total_review = Review::where(['provider_id' =>  $service->provider_id, 'status' => 1])->count();
        $average_rating = Review::where(['provider_id' =>  $service->provider_id, 'status' => 1])->avg('rating');

        $reviewQty = $total_review;
        $reviewPoint = 0;
        $half_rating = false;
        if ($reviewQty > 0) {
            $average = $average_rating;
            $intAverage = intval($average);
            $nextValue = $intAverage + 1;
            $reviewPoint = $intAverage;
            $half_rating = false;
            if($intAverage < $average && $average < $nextValue){
                $reviewPoint = $intAverage + 0.5;
                $half_rating = true;
            }
        }

        $recaptchaSetting = GoogleRecaptcha::first();

        $selected_theme = Session::get('selected_theme');
        if ($selected_theme == 'theme_one'){
            $active_theme = 'layout';
        }elseif($selected_theme == 'theme_two'){
            $active_theme = 'layout2';
        }elseif($selected_theme == 'theme_three'){
            $active_theme = 'layout3';
        }else{
            $active_theme = 'layout';
        }

        $related_services = Service::with('category','provider')->where(['approve_by_admin' => 1, 'status' => 1, 'is_banned' => 0])->select('id','name','slug','image','price','category_id','provider_id','is_banned','status','approve_by_admin')->where('category_id', $service->category_id)->where('id','!=', $service->id)->get();

        return view('show_service')->with([
           'active_theme' => $active_theme,
           'breadcrumb' => $breadcrumb,
           'service' => $service,
           'what_you_will_get' => $what_you_will_get,
           'benifits' => $benifits,
           'schedule_list' => $schedule_list,
           'reviews' => $reviews,
           'default_avatar' => $default_avatar,
           'currency_icon' => $currency_icon,
           'package_features' => $package_features,
           'provider' => $provider,
           'complete_order' => $complete_order,
           'average_rating' => $average_rating,
           'half_rating' => $half_rating,
           'total_review' => $total_review,
           'review_point' => $reviewPoint,
           'recaptchaSetting' => $recaptchaSetting,
           'related_services' => $related_services,
        ]);
    }

    public function storeServiceReview(Request $request){
        $rules = [
            'provider_id'=>'required',
            'service_id'=>'required',
            'rating'=>'required',
            'comment'=>'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $customMessages = [
            'name.required' => trans('user_validation.Name is required'),
            'email.required' => trans('user_validation.Email is required'),
            'comment.required' => trans('user_validation.Comment is required'),
            'blog_id.required' => trans('user_validation.Blog id is required'),
        ];
        $this->validate($request, $rules,$customMessages);
        $user = Auth::guard('web')->user();

        $exist_order = Order::where(['client_id' => $user->id, 'service_id' => $request->service_id, 'order_status' => 'complete'])->count();

        if($exist_order == 0){
            $notification = trans('user_validation.You can not make review before book any service');
            return response()->json(['status' => 0, 'message' => $notification]);
        }

        $exist_review = Review::where(['service_id' => $request->service_id, 'user_id' => $user->id])->count();

        if($exist_review >= $exist_order){
            $notification = trans('user_validation.Review already submited, you can not make multiple review on a single order');
            return response()->json(['status' => 0, 'message' => $notification]);
        }

        $review = new Review();
        $review->user_id = $user->id;
        $review->service_id = $request->service_id;
        $review->provider_id = $request->provider_id;
        $review->review = $request->comment;
        $review->rating = $request->rating;
        $review->save();

        $notification = trans('user_validation.Review submited successfully');
        return response()->json(['status' => 1, 'message' => $notification]);
    }

    public function provider(Request $request, $user_name){
        $breadcrumb = BreadcrumbImage::where(['id' => 9])->first();

        $provider = User::where(['user_name' => $user_name])->select('id','name','user_name','phone','email','image','created_at','designation','address')->first();

        $setting = Setting::first();
        $default_avatar = (object) array('image' => $setting->default_avatar);
        $currency_icon = (object) array('icon' => $setting->currency_icon);

        $complete_order = Order::where('order_status','complete')->where('provider_id', $provider->id)->count();

        $canceled_order = Order::where('provider_id', $provider->id)->where('order_status','order_decliened_by_provider')->orWhere('order_status', 'order_decliened_by_client')->count();

        $total_review = Review::where(['provider_id' =>  $provider->id, 'status' => 1])->count();


        $service_pagiante_qty = CustomPagination::whereId('2')->first()->qty;
        $services = Service::with('category','provider')->where(['approve_by_admin' => 1, 'status' => 1, 'is_banned' => 0, 'provider_id' => $provider->id])->orderBy('id','desc')->select('id','name','slug','image','price','category_id','provider_id','is_banned','status','approve_by_admin');

        if($request->search){
            $services = $services->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('details','LIKE','%'.$request->search.'%');
        }

        $services = $services->paginate($service_pagiante_qty);

        $services = $services->appends($request->all());

        $partners = Partner::where(['status' => 1])->get();

        $selected_theme = Session::get('selected_theme');
        if ($selected_theme == 'theme_one'){
            $active_theme = 'layout';
        }elseif($selected_theme == 'theme_two'){
            $active_theme = 'layout2';
        }elseif($selected_theme == 'theme_three'){
            $active_theme = 'layout3';
        }else{
            $active_theme = 'layout';
        }

        return view('show_provider')->with([
            'active_theme' => $active_theme,
            'breadcrumb' => $breadcrumb,
            'provider' => $provider,
            'default_avatar' => $default_avatar,
            'currency_icon' => $currency_icon,
            'complete_order' => $complete_order,
            'canceled_order' => $canceled_order,
            'total_review' => $total_review,
            'services' => $services,
            'partners' => $partners,
        ]);
    }

    public function subscribeRequest(Request $request){
        if($request->email != null){
            $isExist = Subscriber::where('email', $request->email)->count();
            if($isExist == 0){
                $subscriber = new Subscriber();
                $subscriber->email = $request->email;
                $subscriber->verified_token = Str::random(25);
                $subscriber->save();

                MailHelper::setMailConfig();

                $template=EmailTemplate::where('id',3)->first();
                $message=$template->description;
                $subject=$template->subject;
                Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber,$message,$subject));

                return response()->json(['status' => 1, 'message' => trans('user_validation.Subscription successfully, please verified your email')]);

            }else{
                return response()->json(['status' => 0, 'message' => trans('user_validation.Email already exist')]);
            }
        }else{
            return response()->json(['status' => 0, 'message' => trans('user_validation.Email Field is required')]);
        }
    }

    public function subscriberVerifcation($token){
        $subscriber = Subscriber::where('verified_token',$token)->first();
        if($subscriber){
            $subscriber->verified_token = null;
            $subscriber->is_verified = 1;
            $subscriber->save();
            $notification = trans('user_validation.Email verification successfully');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('home')->with($notification);
        }else{
            $notification = trans('user_validation.Invalid token');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('home')->with($notification);
        }

    }



    public function downloadListingFile($file){
        $filepath= public_path() . "/uploads/custom-images/".$file;
        return response()->download($filepath);
    }


}
