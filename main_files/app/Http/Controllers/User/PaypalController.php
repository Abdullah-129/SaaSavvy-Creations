<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\PaymentExecution;

use App\Mail\OrderSuccessfully;
use App\Helpers\MailHelper;
use App\Models\EmailTemplate;
use App\Models\PaypalPayment;
use App\Models\BreadcrumbImage;
use App\Models\PricingPlan;

use App\Models\Order;
use App\Models\Setting;

use Str;
use Cart;
use Mail;
use Session;
use Auth;


class PaypalController extends Controller
{
    private $apiContext;
    public function __construct()
    {
        $account = PaypalPayment::first();
        $paypal_conf = \Config::get('paypal');
        $this->apiContext = new ApiContext(new OAuthTokenCredential(
            $account->client_id,
            $account->secret_id,
            )
        );

        $setting=array(
            'mode' => $account->account_mode,
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR'
        );
        $this->apiContext->setConfig($setting);
    }


    public function payWithPaypal($id){
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }


        $user = Auth::guard('web')->user();
        $pricing_plan = PricingPlan::where('id',$id)->first();

        $paypalSetting = PaypalPayment::first();
        $payableAmount = round($pricing_plan->plan_price * $paypalSetting->currency_rate,2);

        $name=env('APP_NAME');

        // set payer
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // set amount total
        $amount = new Amount();
        $amount->setCurrency($paypalSetting->currency_code)
            ->setTotal($payableAmount);

        // transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription(env('APP_NAME'));

        // redirect url
        $redirectUrls = new RedirectUrls();

        $root_url=url('/');
        $redirectUrls->setReturnUrl(route('paypal-payment-success'))
            ->setCancelUrl(route('paypal-payment-cancled'));

        // payment
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {

            $notification = trans('user_validation.Payment Faild');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        // get paymentlink
        $approvalUrl = $payment->getApprovalLink();

        Session::put('pricing_plan', $pricing_plan);

        return redirect($approvalUrl);
    }

    public function paypalPaymentSuccess(Request $request){
        $pricing_plan = Session::get('pricing_plan');

        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            $notification = trans('user_validation.Payment Faild');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('payment', $pricing_plan->plan_slug)->with($notification);
        }

        $payment_id=$request->get('paymentId');
        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {

            $user = Auth::guard('web')->user();
            $order = $this->create_order($user, $pricing_plan, 'Paypal', 1, $payment_id);
            $this->send_mail_to_user($user, $order);

            $notification = trans('user_validation.You have successfully enrolled the package.');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('dashboard')->with($notification);
        }
    }

    public function paypalPaymentCancled(){

        $pricing_plan = Session::get('pricing_plan');

        $notification = trans('user_validation.Payment Faild');
        $notification = array('messege'=>$notification,'alert-type'=>'error');
        return redirect()->route('payment', $pricing_plan->plan_slug)->with($notification);
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
