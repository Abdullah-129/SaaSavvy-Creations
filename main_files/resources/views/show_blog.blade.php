@extends('layout')
@section('title')
    <title>{{ $blog->title }}</title>
    <title>{{ $blog->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $blog->seo_description }}">
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
                        <h4>{{__('user.blog details')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.blog details')}} </li>
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


    <!--==========================
        BLOG DETAILS START
    ===========================-->
    <section id="blog_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog_left">
                        <div class="main_blog">
                            <div class="img">
                                <img src="{{ asset($blog->image) }}" alt="blog images" class="img-fluid w-100">
                            </div>
                            <div class="main_blog_text">
                                <p class="top_row">
                                    <span><i class="fas fa-user"></i> {{__('user.by admin')}}</span>
                                    <span><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('d M Y') }}</span>
                                    <span><i class="fas fa-comment-alt-lines"></i> {{ $blog->total_comment }} {{__('user.Comments')}}</span>
                                    <span><i class="fas fa-folder"></i> {{ $blog->category->name }}</span>
                                </p>
                                <h4>{{ $blog->title }}</h4>
                                {!! clean($blog->description) !!}
                            </div>
                        </div>

                        <div class="share_blog" data-aos="fade-right">
                            <h4>{{__('user.You can share this post')}} :</h4>
                            <ul class="share_link">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog', $blog->slug) }}&t={{ $blog->title }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/share?text={{ $blog->title }}&url={{ route('blog', $blog->slug) }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('blog', $blog->slug) }}&title={{ $blog->title }}"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="https://www.pinterest.com/pin/create/button/?description={{ $blog->title }}&media=&url={{ route('blog', $blog->slug) }}"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                        <div class="comment_area" data-aos="fade-right">
                            @if ($facebookComment->comment_type == 1)
                                <h5 class="comment_heading">{{ $blog->total_comment }} {{__('user.Comments')}}</h5>
                                @foreach ($blog_comments as $index => $blog_comment)
                                    <div class="single_comment">
                                        <div class="comm_img">
                                            <img src="http://www.gravatar.com/avatar" alt="comment" class="img-fluid">
                                        </div>
                                        <div class="comm_text">
                                            <p class="com_top_area">{{ $blog_comment->name }} </p>
                                            <h5>{{ $blog_comment->created_at->format('d M Y') }}</h5>
                                            <p>{{ $blog_comment->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="10"></div>
                            @endif
                        </div>
                        @if ($facebookComment->comment_type == 1)
                        <div class="comment_input" data-aos="fade-right">
                            <form id="blogCommentForm">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <input class="input_1" type="text" placeholder="{{__('user.Name')}} *" name="name">
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    </div>
                                    <div class="col-xl-6">
                                        <input class="input_2" type="email" placeholder="{{__('user.Email')}} *" name="email">
                                    </div>

                                    <div class="col-xl-12">
                                        <textarea name="comment" id="comment" cols="3" rows="5"
                                            placeholder="{{__('user.Your Comments')}} *"></textarea>
                                    </div>

                                    @if($recaptchaSetting->status==1)
                                        <div class="col-xl-12 mt-3">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                        </div>
                                    @endif

                                    <div class="col-xl-12">
                                        <button class="read_btn" type="submit">{{__('user.submit')}}</button>
                                    </div>


                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog_right">
                        <div class="blog_search" data-aos="fade-left">
                            <form action="{{ route('blogs') }}">
                                <input type="text" placeholder="{{__('user.Search')}}..." name="search">
                                <button class="read_btn" type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="categorie" data-aos="fade-left">
                            <h3>{{__('user.Categories')}}</h3>
                            <ul>
                                @foreach ($categories as $category)
                                <li><a href="{{ route('blogs', ['category' => $category->slug]) }}"><i class="fas fa-caret-right"></i> {{ $category->name }}<span>({{ $category->totalBlog }})</span></a></li>
                                @endforeach

                            </ul>
                        </div>
                        @if ($popular_blogs->count() > 0)
                            <div class="recent_post" data-aos="fade-left">
                                <h3>{{__('user.Popular Blog')}}</h3>
                                @foreach ($popular_blogs as $popular_blog)
                                    <div class="single_post">
                                        <a href="{{ route('blog', $popular_blog->slug) }}">
                                            <div class="single_img">
                                                <img src="{{ asset($popular_blog->image) }}" alt="blog" class="img-fluid">
                                            </div>
                                            <div class="single_text">
                                                <p>{{ $popular_blog->title }}</p>
                                                <span><i class="far fa-calendar-alt"></i> {{ $popular_blog->created_at->format('d M Y') }}</span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        BLOG DETAILS END
    ===========================-->

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId={{ $facebookComment->app_id }}&autoLogAppEvents=1" nonce="MoLwqHe5"></script>

    <script>
        (function($) {
            "use strict";
            $(document).ready(function () {
                $("#blogCommentForm").on('submit', function(e){
                    e.preventDefault();
                    var isDemo = "{{ env('APP_MODE') }}"
                    if(isDemo == 'DEMO'){
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
                    $.ajax({
                        type: 'POST',
                        data: $('#blogCommentForm').serialize(),
                        url: "{{ route('blog-comment') }}",
                        success: function (response) {
                            if(response.status == 1){
                                toastr.success(response.message)
                                $("#blogCommentForm").trigger("reset");
                            }
                        },
                        error: function(response) {
                            if(response.responseJSON.errors.name)toastr.error(response.responseJSON.errors.name[0])
                            if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                            if(response.responseJSON.errors.comment)toastr.error(response.responseJSON.errors.comment[0])

                            if(!response.responseJSON.errors.name && !response.responseJSON.errors.email && !response.responseJSON.errors.comment){
                                toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                            }
                        }
                    });
                })
            });
        })(jQuery);

    </script>

@endsection
