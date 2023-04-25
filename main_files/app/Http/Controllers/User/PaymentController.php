<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\StripePayment;
use App\Models\PaypalPayment;
use App\Mail\OrderSuccessfully;
use App\Helpers\MailHelper;
use App\Models\EmailTemplate;
use App\Models\RazorpayPayment;
use App\Models\Flutterwave;
use App\Models\PaystackAndMollie;
use App\Models\InstamojoPayment;
use App\Models\PaymongoPayment;
use App\Models\BankPayment;
use App\Models\BreadcrumbImage;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\PricingPlan;

use Mail;
Use Stripe;
use Cart;
use Session;
use Str;
use Razorpay\Api\Api;
use Exception;
use Redirect;
use Auth;

use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }


    public function payment_page($id){
        $breadcrumb = BreadcrumbImage::where(['id' => 3])->first();
        $pricing_plan = PricingPlan::where('plan_slug',$id)->first();

        $user = Auth::guard('web')->user();
        $bankPayment = BankPayment::select('id','status','account_info','image')->first();
        $stripe = StripePayment::first();
        $paypal = PaypalPayment::first();
        $razorpay = RazorpayPayment::first();
        $flutterwave = Flutterwave::first();
        $mollie = PaystackAndMollie::first();
        $paystack = $mollie;
        $instamojoPayment = InstamojoPayment::first();

        return view('payment', compact('breadcrumb','pricing_plan','stripe','paypal','razorpay','flutterwave','user','mollie','paystack','instamojoPayment','bankPayment'));
    }

    public function free_enroll($id){

        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $pricing_plan = PricingPlan::where('id',$id)->first();

        $user = Auth::guard('web')->user();

        $is_free_exist = Order::where(['user_id' => $user->id, 'plan_price' => 0])->count();
        if($is_free_exist > 0){
            $notification = trans('user_validation.You can not enroll free package muliple time');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $order = $this->create_order($user, $pricing_plan, 'Free Enroll', 1, 'free_enroll');
        $this->send_mail_to_user($user, $order);

        $notification = trans('user_validation.You have successfully enrolled the package.');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('dashboard')->with($notification);

    }

    public function bank_payment(Request $request, $id){
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $rules = [
            'tnx_info'=>'required',
        ];
        $customMessages = [
            'tnx_info.required' => trans('user_validation.Transaction is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $pricing_plan = PricingPlan::where('id',$id)->first();

        $user = Auth::guard('web')->user();

        $order = $this->create_order($user, $pricing_plan, 'Bank Payment', 0, $request->tnx_info);

        $this->send_mail_to_user($user, $order);

        $notification = trans('user_validation.You have successfully enrolled the package. please wait for admin payment approval');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('dashboard')->with($notification);
    }


    public function pay_with_stripe(Request $request, $id){

        $pricing_plan = PricingPlan::where('id',$id)->first();

        $stripe = StripePayment::first();
        $payableAmount = round($pricing_plan->plan_price * $stripe->currency_rate,2);
        Stripe\Stripe::setApiKey($stripe->stripe_secret);

        $result = Stripe\Charge::create ([
                "amount" => $payableAmount * 100,
                "currency" => $stripe->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME')
            ]);

        $user = Auth::guard('web')->user();

        $order = $this->create_order($user, $pricing_plan, 'Stripe', 1, $result->balance_transaction);

        $this->send_mail_to_user($user, $order);

        $notification = trans('user_validation.You have successfully enrolled the package.');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('dashboard')->with($notification);
    }

    public function pay_with_razorpay(Request $request, $id){
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $razorpay = RazorpayPayment::first();
        $input = $request->all();
        $api = new Api($razorpay->key,$razorpay->secret_key);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payId = $response->id;

                $pricing_plan = PricingPlan::where('id',$id)->first();


                $user = Auth::guard('web')->user();

                $order = $this->create_order($user, $pricing_plan, 'Razorpay', 1, $payId);

                $this->send_mail_to_user($user, $order);

                $notification = trans('user_validation.You have successfully enrolled the package.');
                $notification = array('messege'=>$notification,'alert-type'=>'success');
                return redirect()->route('dashboard')->with($notification);


            }catch (Exception $e) {
                $notification = trans('user_validation.Payment Faild');
                $notification = array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = trans('user_validation.Payment Faild');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }

    public function pay_with_flutterwave(Request $request, $id){
        $flutterwave = Flutterwave::first();
        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $flutterwave->secret_key;
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if($response->status == 'success'){

            $pricing_plan = PricingPlan::where('id',$id)->first();
            $user = Auth::guard('web')->user();
            $order = $this->create_order($user, $pricing_plan, 'Flutterwave', 1, $tnx_id);
            $this->send_mail_to_user($user, $order);

            $notification = trans('user_validation.You have successfully enrolled the package.');
            return response()->json(['status' => 'success' , 'message' => $notification]);
        }else{
            $notification = trans('user_validation.Payment Faild');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }
    }

    public function pay_with_mollie(Request $request, $id){
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $pricing_plan = PricingPlan::where('id',$id)->first();

        $mollie = PaystackAndMollie::first();
        $price = $pricing_plan->plan_price * $mollie->mollie_currency_rate;
        $price = round($price,2);
        $price = sprintf('%0.2f', $price);

        $mollie_api_key = $mollie->mollie_key;
        $currency = strtoupper($mollie->mollie_currency_code);
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => ''.$price.'',
            ],
            'description' => env('APP_NAME'),
            'redirectUrl' => route('mollie-payment-success'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        session()->put('payment_id',$payment->id);
        session()->put('pricing_plan',$pricing_plan);
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function mollie_payment_success(Request $request){
        $pricing_plan = Session::get('pricing_plan');

        $mollie = PaystackAndMollie::first();
        $mollie_api_key = $mollie->mollie_key;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()){
            $user = Auth::guard('web')->user();
            $order = $this->create_order($user, $pricing_plan, 'Mollie', 1, session()->get('payment_id'));
            $this->send_mail_to_user($user, $order);

            $notification = trans('user_validation.You have successfully enrolled the package.');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('dashboard')->with($notification);

        }else{
            $notification = trans('user_validation.Payment Faild');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('payment', $pricing_plan->plan_slug)->with($notification);
        }
    }

    public function pay_with_paystack(Request $request, $id){
        $paystack = PaystackAndMollie::first();

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $paystack->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);
        if($final_data->status == true) {

            $pricing_plan = PricingPlan::where('id',$id)->first();
            $user = Auth::guard('web')->user();
            $order = $this->create_order($user, $pricing_plan, 'Paystack', 1, $transaction);
            $this->send_mail_to_user($user, $order);

            $notification = trans('user_validation.You have successfully enrolled the package.');
            return response()->json(['status' => 'success' , 'message' => $notification]);
        }else{
            $notification = trans('user_validation.Payment Faild');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }
    }

    public function pay_with_instamojo(Request $request, $id){
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $pricing_plan = PricingPlan::where('id',$id)->first();

        $instamojoPayment = InstamojoPayment::first();
        $price = $pricing_plan->plan_price * $instamojoPayment->currency_rate;
        $price = round($price,2);

        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url.'payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $payload = Array(
            'purpose' => env("APP_NAME"),
            'amount' => $price,
            'phone' => '918160651749',
            'buyer_name' => Auth::user()->name,
            'redirect_url' => route('response-instamojo'),
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => Auth::user()->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        Session::put('pricing_plan', $pricing_plan);
        return redirect($response->payment_request->longurl);
    }

    public function instamojo_response(Request $request){

        $pricing_plan = Session::get('pricing_plan');

        $input = $request->all();
        $instamojoPayment = InstamojoPayment::first();
        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $notification = trans('user_validation.Payment Faild');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('payment', $pricing_plan->plan_slug)->with($notification);
        } else {
            $data = json_decode($response);
        }

        if($data->success == true) {
            if($data->payment->status == 'Credit') {
                $user = Auth::guard('web')->user();
                $order = $this->create_order($user, $pricing_plan, 'Instamojo', 1, $request->get('payment_id'));
                $this->send_mail_to_user($user, $order);

                $notification = trans('user_validation.You have successfully enrolled the package.');
                $notification = array('messege'=>$notification,'alert-type'=>'success');
                return redirect()->route('dashboard')->with($notification);
            }
        }else{
            $notification = trans('user_validation.Payment Faild');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('payment', $service->slug)->with($notification);
        }
    }

    public function create_order($user, $pricing_plan, $payment_method, $payment_status, $transaction){

        Order::where('user_id', 1)->update(['status' => 0]);
        $user->total_word = 0;
        $user->save();

        $order = new Order();
        $order->order_id = substr(rand(0,time()),0,10);
        $order->user_id = $user->id;
        $order->payment_method = $payment_method;
        $order->payment_status = $payment_status;
        $order->transection_id = $transaction;
        $order->pricing_plan_id = $pricing_plan->id;
        $order->purchase_date = date('Y-m-d');
        $order->expired_date = $pricing_plan->expiration_day ==-1 ? null : date('Y-m-d', strtotime($pricing_plan->expiration_day.' days'));
        $order->expiration_day = $pricing_plan->expiration_day;
        $order->plan_price = $pricing_plan->plan_price;
        $order->maximum_keyword_generate = $pricing_plan->maximum_keyword_generate;
        $order->enable_image_search = $pricing_plan->enable_image_search;
        $order->enable_custom_search = $pricing_plan->enable_custom_search;
        $order->status = 1;
        $order->save();

        return $order;
    }

    public function send_mail_to_user($user, $order){

        MailHelper::setMailConfig();

        $setting = Setting::first();

        $payment_status = $order->payment_status == 1 ? 'Success' : 'Pending';
        $template=EmailTemplate::where('id',6)->first();
        $subject=$template->subject;
        $message=$template->description;
        $message = str_replace('{{user_name}}',$user->name,$message);
        $message = str_replace('{{total_amount}}',$setting->currency_icon.$order->plan_price,$message);
        $message = str_replace('{{payment_method}}',$order->payment_method,$message);
        $message = str_replace('{{payment_status}}',$payment_status,$message);
        Mail::to($user->email)->send(new OrderSuccessfully($message,$subject));

    }
}
