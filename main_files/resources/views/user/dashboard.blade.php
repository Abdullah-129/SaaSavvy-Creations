@extends('layout')
@section('title')
    <title>{{__('user.Dashboard')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Dashboard')}}">
@endsection

@section('frontend-content')
   <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part" style="background: url({{ asset($breadcrumb->image) }});">
        <div class="bread_overlay">
            <div class="img">
                <img src="{{ asset($breadcrumb->foreground_image) }}" alt="breadcrumb" class="img-fluid w-100">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-white">
                        <h4>{{__('user.Dashboard')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Dashboard')}} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        BREADCRUMB PART END
    ===========================-->

    <!--=========================
        DASHBOARD START
    ==========================-->
    <section class="wsus__dashboard">
        <div class="container-fluid">
            <div class="wsus__dashboard_area">
                <div class="row">
                    @include('user.sidebar')

                    <div class="col-xl-9 col-lg-8">
                        <div class="wsus__dashboard_content">
                            <div class="wsus_dashboard_body">
                                <div class="dashboard_ai_writing">
                                    <!-- <h3>payment history</h3> -->
                                    <div class="row">

                                        <div class="col-xl-5 col-xxl-4 col-md-5" data-aos="fade-right">
                                            <form id="aiContentForm">
                                                @csrf
                                            <div class="ai_writing_sidebar">
                                                <div class="ai_writing_sidebar_input">
                                                    <label>{{__('user.Choose Use Case')}}</label>
                                                    <select name="usecase_id" class="select_js" id="usecase_id">
                                                        @foreach ($usecases as $usecase)
                                                                @if ($usecase->id == 15)
                                                                    @if ($payment_history)
                                                                        @if ($payment_history->enable_custom_search == 1)
                                                                            <option {{ request()->get('usecase') == $usecase->id ? 'selected' : '' }} value="{{ $usecase->id }}">{{ $usecase->title }}</option>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    <option {{ request()->get('usecase') == $usecase->id ? 'selected' : '' }} value="{{ $usecase->id }}">{{ $usecase->title }}</option>
                                                                @endif



                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="ai_writing_sidebar_input business_idea">
                                                    <label>{{__('user.Topic')}}</label>
                                                    <input type="text" name="business_topic" placeholder="{{__('user.Type your interest...')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input business_idea">
                                                    <label>{{__('user.Your skill')}}</label>
                                                    <textarea name="skill" rows="4"
                                                        placeholder="{{__('user.Type your skill')}}"></textarea>
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none blog_idea ">
                                                    <label>{{__('user.Primary Keyword')}}</label>
                                                    <input type="text" name="primary_keyword" placeholder="{{__('user.Web design, Php website, Laravel Website')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none blog_section_writing ">
                                                    <label>{{__('user.Your Topic')}}</label>
                                                    <input type="text" name="topic" placeholder="{{__('user.Web design, Php website, Laravel Website')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none cover_letter ">
                                                    <label>{{__('user.Job Role')}}</label>
                                                    <input type="text" name="job_role" placeholder="{{__('user.Content writer')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none cover_letter">
                                                    <label>{{__('user.Your Skills')}}</label>
                                                    <input type="text" name="job_skill" placeholder="{{__('user.Blog writing, copywriter')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none cover_letter">
                                                    <label>{{__('user.Job Experience')}}</label>
                                                    <input type="text" name="job_experience" placeholder="{{__('user.1 year + ')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none social_media_ad">
                                                    <label>{{__('user.Product Name')}}</label>
                                                    <input type="text" name="product_name" placeholder="{{__('user.Electronics accessories')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none google_ad">
                                                    <label>{{__('user.Product Name')}}</label>
                                                    <input type="text" name="product_name_for_google" placeholder="{{__('user.Electronics accessories')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none video_idea">
                                                    <label>{{__('user.Topic')}}</label>
                                                    <input type="text" name="video_idea_topic" placeholder="{{__('user.Write your topic here...')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none video_description">
                                                    <label>{{__('user.Topic')}}</label>
                                                    <input type="text" name="video_description" placeholder="{{__('user.Write your topic here...')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none seo_meta_title">
                                                    <label>{{__('user.Your Target Keywords')}}</label>
                                                    <input type="text" name="seo_meta_title" placeholder="{{__('user.Web design, development etc')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none seo_meta_description">
                                                    <label>{{__('user.Your Target Keywords')}}</label>
                                                    <input type="text" name="seo_meta_description" placeholder="{{__('user.Web design, development etc')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none post_topic">
                                                    <label>{{__('user.Your Topic')}}</label>
                                                    <input type="text" name="post_topic" placeholder="{{__('user.Web design, development etc')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none product_description">
                                                    <label>{{__('user.Product Name')}}</label>
                                                    <input type="text" name="product_name_description" placeholder="{{__('user.Mobile charger, bettery etc')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none tag_generate">
                                                    <label>{{__('user.Your Topic')}}</label>
                                                    <input type="text" name="tag_generate" placeholder="{{__('user.Mobile charger, bettery etc')}}" autocomplete="off">
                                                </div>

                                                <div class="ai_writing_sidebar_input d-none custom_prompt">
                                                    <label>{{__('user.Custom Search')}}</label>
                                                    <input type="text" name="custom_prompt" placeholder="{{__('user.How to use chatgpt')}}" autocomplete="off">
                                                </div>

                                                <button id="search_ai_btn" class="read_btn" type="submit"><i class="fas fa-pencil"></i>
                                                    {{__('user.write for me')}}</button>
                                            </div>
                                        </form>
                                        </div>

                                        <div class="col-xl-7 col-xxl-8 col-md-7" data-aos="fade-left">
                                            <div class="ai_writing_body">
                                                <textarea id="ai_content_output" class="form-control summernote"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        DASHBOARD END
    ===========================-->


<script>
    let use_case_from_url = "{{ request()->has('usecase') ? request()->get('usecase') : 1 }}";

    let business_idea = true;
    let blog_idea = true;
    let blog_section_writing = true;
    let cover_letter = true;
    let social_media_ad = true;
    let google_ad = true;
    let video_idea = true;
    let video_description = true;
    let seo_meta_title = true;
    let seo_meta_description = true;
    let post_topic = true;
    let product_description = true;
    let tag_generate = true;
    let custom_prompt = true;

    (function($) {
    "use strict";
    $(document).ready(function () {

        $("#usecase_id").on("change", function(){
            let current_val = $(this).val();
            usecaseStatus(current_val)
        })
        $("#aiContentForm").on("submit", function(e){
            e.preventDefault();

            $("#search_ai_btn").attr("disabled", true);
            $("#search_ai_btn").html("{{__('user.Searching...')}}");

            $.ajax({
                type:"post",
                data: $('#aiContentForm').serialize(),
                url:"{{ route('ai-writer') }}",
                success:function(response){

                    $("#search_ai_btn").attr("disabled", false);
                    $("#search_ai_btn").html("{{__('user.write for me')}}");

                    if(response.status == 'success'){
                        tinyMCE.get('ai_content_output').setContent(nl2br(response.ai_response));
                        let left_html = `${response.left_word} {{__('user.Words Left')}}`;
                        $("#left_word").html(left_html);
                        toastr.success("{{__('user.Content generated successfully')}}")

                        $("#aiContentForm").trigger("reset");

                        $("#search_ai_btn").attr("disabled", false);
                        $("#search_ai_btn").html("{{__('user.write for me')}}");
                    }

                    if(response.status == 'faild'){
                        $("#search_ai_btn").attr("disabled", false);
                        $("#search_ai_btn").html("{{__('user.write for me')}}");

                        $("#aiContentForm").trigger("reset");
                        toastr.error(response.message);


                    }

                },
                error:function(err){
                    $("#search_ai_btn").attr("disabled", false);
                    $("#search_ai_btn").html("{{__('user.write for me')}}");
                }
            })
        })

    });

    })(jQuery);


    function usecaseStatus(value){
        let current_val = value;
        if(current_val == 1){
            business_idea = true;
            blog_idea = false;
            blog_section_writing = false;
            cover_letter = false;
            social_media_ad = false;
            google_ad = false;
            video_idea = false;
            video_description = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 2){
            blog_idea = true;
            business_idea = false;
            blog_section_writing = false;
            cover_letter = false;
            social_media_ad = false;
            google_ad = false;
            video_idea = false;
            video_description = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 3){
            blog_section_writing = true;
            blog_idea = false;
            business_idea = false;
            cover_letter = false;
            social_media_ad = false;
            google_ad = false;
            video_idea = false;
            video_description = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 4){
            cover_letter = true;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            social_media_ad = false;
            google_ad = false;
            video_idea = false;
            video_description = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 6){
            social_media_ad = true;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            google_ad = false;
            video_idea = false;
            video_description = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 7){
            google_ad = true;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            video_idea = false;
            video_description = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;


        }else if(current_val == 8){
            video_idea = true;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            video_description = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;


        }else if(current_val == 9){
            video_description = true;
            video_idea = false;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            seo_meta_title = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 10){
            seo_meta_title = true;
            video_description = false;
            video_idea = false;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            seo_meta_description = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 11){
            seo_meta_description = true;
            seo_meta_title = false;
            video_description = false;
            video_idea = false;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            post_topic = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 12){
            post_topic = true;
            seo_meta_description = false;
            seo_meta_title = false;
            video_description = false;
            video_idea = false;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            product_description = false;
            tag_generate = false;
            custom_prompt = false;

        }else if(current_val == 13){
            product_description = true;
            post_topic = false;
            seo_meta_description = false;
            seo_meta_title = false;
            video_description = false;
            video_idea = false;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            tag_generate = false;
            custom_prompt = false;


        }else if(current_val == 14){
            tag_generate = true;
            product_description = false;
            post_topic = false;
            seo_meta_description = false;
            seo_meta_title = false;
            video_description = false;
            video_idea = false;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;
            custom_prompt = false;

        }else if(current_val == 15){
            custom_prompt = true;
            tag_generate = false;
            product_description = false;
            post_topic = false;
            seo_meta_description = false;
            seo_meta_title = false;
            video_description = false;
            video_idea = false;
            google_ad = false;
            social_media_ad = false;
            cover_letter = false;
            blog_section_writing = false;
            blog_idea = false;
            business_idea = false;

        }

        loadDynamicField()
    }

    function nl2br(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />'   : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag   + '$2');
    }

    function loadDynamicField(){
        if(business_idea == true){
            $(".business_idea").removeClass('d-none');

            $(".blog_idea").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".addClass").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", true);
            $("textarea[name='skill']").attr("required", true);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(blog_idea == true){
            $(".blog_idea").removeClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".addClass").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", true);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(blog_section_writing == true){
            $(".blog_section_writing").removeClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".addClass").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", true);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(cover_letter == true){
            $(".cover_letter").removeClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".addClass").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", true);
            $("input[name='job_skill']").attr("required", true);
            $("input[name='job_experience']").attr("required", true);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(social_media_ad == true){
            $(".social_media_ad").removeClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".addClass").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", true);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(google_ad == true){
            $(".google_ad").removeClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", true);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(video_idea == true){
            $(".video_idea").removeClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", true);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);


        }else if(video_description == true){
            $(".video_description").removeClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", true);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(seo_meta_title == true){
            $(".seo_meta_title").removeClass('d-none');
            $(".video_description").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", true);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(seo_meta_description == true){
            $(".seo_meta_description").removeClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", true);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(post_topic == true){
            $(".post_topic").removeClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", true);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(product_description == true){
            $(".product_description").removeClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');
            $(".tag_generate").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", true);
            $("input[name='tag_generate']").attr("required", false);

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

        }else if(tag_generate == true){
            $(".tag_generate").removeClass('d-none');
            $(".product_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');

            $(".custom_prompt").addClass('d-none');
            $("input[name='custom_prompt']").attr("required", false);

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", true);
        }else if(custom_prompt == true){
            $(".custom_prompt").removeClass('d-none');
            $(".tag_generate").addClass('d-none');
            $(".product_description").addClass('d-none');
            $(".post_topic").addClass('d-none');
            $(".seo_meta_description").addClass('d-none');
            $(".seo_meta_title").addClass('d-none');
            $(".video_description").addClass('d-none');
            $(".video_idea").addClass('d-none');
            $(".google_ad").addClass('d-none');
            $(".social_media_ad").addClass('d-none');
            $(".cover_letter").addClass('d-none');
            $(".blog_section_writing").addClass('d-none');
            $(".business_idea").addClass('d-none');
            $(".blog_idea").addClass('d-none');

            $("input[name='business_topic']").attr("required", false);
            $("textarea[name='skill']").attr("required", false);
            $("input[name='primary_keyword']").attr("required", false);
            $("input[name='topic']").attr("required", false);
            $("input[name='job_role']").attr("required", false);
            $("input[name='job_skill']").attr("required", false);
            $("input[name='job_experience']").attr("required", false);
            $("input[name='product_name']").attr("required", false);
            $("input[name='product_name_for_google']").attr("required", false);
            $("input[name='video_idea_topic']").attr("required", false);
            $("input[name='video_description']").attr("required", false);
            $("input[name='seo_meta_title']").attr("required", false);
            $("input[name='seo_meta_description']").attr("required", false);
            $("input[name='post_topic']").attr("required", false);
            $("input[name='product_name_description']").attr("required", false);
            $("input[name='tag_generate']").attr("required", false);
            $("input[name='custom_prompt']").attr("required", true);
        }

    }

    usecaseStatus(use_case_from_url)
</script>
@endsection
