<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BreadcrumbImage;
use App\Models\User;
use App\Models\AiHistory;
use App\Models\Order;
use App\Models\Setting;

use Image;
use File;
Use Auth;

use Orhanerday\OpenAi\OpenAi;

class AIWriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }


    public function ai_write(Request $request){

        $user = Auth::guard('web')->user();

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();
        if(!$payment_history){
            $notification = trans('user_validation.Before generate AI content, you have to purchase package');
            return response()->json(['status' => 'faild','message' => $notification]);
        }
        if($payment_history){
            $left_word = $payment_history->maximum_keyword_generate - $user->total_word;
        }else{
            $left_word = 0;
        }

        if($left_word < 500){
            $notification = trans('user_validation.Your generated word limit is exceeded. You can not generate more');
            return response()->json(['status' => 'faild','message' => $notification]);
        }

        if($payment_history->payment_status == 0) {
            $notification = trans('user_validation.Your subscription is pending for your bank payment issue. After review by admin you can able to search.');
            return response()->json(['status' => 'faild','message' => $notification]);
        }

        if($payment_history->expired_date != null) {
            if((date('Y-m-d') > $payment_history->expired_date)){
                $notification = trans('user_validation.Your subscription is expired, Please renew the subscription');
                return response()->json(['status' => 'faild','message' => $notification]);
            }
        }


        $prompt = '';
        if($request->usecase_id == 1){
            $prompt = 'Write a business idea. My interest are '. $request->business_topic. '. My skills are '. $request->skill;
        }

        if($request->usecase_id == 2){
            $prompt = 'Write a blog idea and outline about '. $request->primary_keyword;
        }

        if($request->usecase_id == 3){
            $prompt = 'Write a blog, the topic is '. $request->topic;
        }

        if($request->usecase_id == 4){
            $prompt = 'Write a cover letter, the job role is '. $request->job_role.'.My skills are '. $request->job_skill.'. My previous job experience is '. $request->job_experience;
        }

        if($request->usecase_id == 6){
            $prompt = 'Write a facebook, twitter, linkedin ads. my product name is '. $request->product_name;
        }

        if($request->usecase_id == 7){
            $prompt = 'Write a google ads. The product is '.$request->product_name_for_google;
        }

        if($request->usecase_id == 8){
            $prompt = 'I want to make a video. My video topic is '.$request->video_idea_topic.'. But I have no idea about it. Please suggest some video ideas.';
        }

        if($request->usecase_id == 9){
            $prompt = 'I have a video. I want to make a video description for it. My video topic is '.$request->video_description.'. But I have no idea about it. Please make a description.';
        }

        if($request->usecase_id == 10){
            $prompt = 'I need some seo meta title. My target keywords are '.$request->seo_meta_title.'. But I have no idea about it. Please make some seo meta title.';
        }

        if($request->usecase_id == 11){
            $prompt = 'I need some seo meta description. My target keywords are '.$request->seo_meta_description.'. But I have no idea about it. Please make some seo meta description.';
        }

        if($request->usecase_id == 12){
            $prompt = 'I need a post and caption idea. My topic is '.$request->post_topic.'. But I have no idea about it. Please make post and caption.';
        }

        if($request->usecase_id == 13){
            $prompt = 'I need a product description. My product is '.$request->product_name_description.'. But I have no idea about it. Please make high quality product description.';
        }

        if($request->usecase_id == 14){
            $prompt = 'I need a some tag keyword. My topic is '.$request->tag_generate.'. But I have no idea about it. Please make high quality tag keyword.';
        }

        if($request->usecase_id == 15){
            $prompt = $request->custom_prompt;
        }



        $ai_response = $this->generate_ai_content($prompt);

        $ai_history = new AiHistory();
        $user = Auth::guard('web')->user();
        $ai_history->user_id = $user->id;
        $ai_history->title = 'Ai-document';
        $ai_history->ai_content = $ai_response;
        $ai_history->total_word = str_word_count($ai_response);
        $ai_history->save();

        $exist_word = $user->total_word;
        $user->total_word = $exist_word + str_word_count($ai_response);
        $user->save();

        $payment_history = Order::where('user_id', $user->id)->orderBy('id','desc')->first();

        $left_word = $payment_history->maximum_keyword_generate - $user->total_word;


        return response()->json(['status' => 'success', 'ai_response' => $ai_response, 'left_word' => $left_word]);
    }


    public function generate_ai_content($prompt){
        $setting = Setting::first();
        $open_ai_key = $setting->open_ai_key;
        $open_ai = new OpenAi($open_ai_key);

        $complete = $open_ai->completion([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 500,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
            'n' => 1 /* optional,  number of completion, default value 1 */
        ]);

        $final = json_decode($complete);
        return $final->choices[0]->text;
    }




}
