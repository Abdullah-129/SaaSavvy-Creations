@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('title')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
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
                        <h4>{{__('user.blog')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.blog')}} </li>
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
        BLOG PAGE START
    ===========================-->
    <section id="blog_page">
        <div class="container">
            <div class="blog_area">
                <div class="row">
                    @foreach ($blogs as $index => $blog)
                        <div class="col-xl-4 col-md-6 col-lg-6" data-aos="fade-up">
                            <div class="single_blog">
                                <img src="{{ asset($blog->image) }}" alt="bloh images" class="img-fluid w-100">
                                <span><i class="fal fa-calendar-alt"></i> {{ $blog->created_at->format('d M Y') }}</span>
                                <span><i class="fas fa-user"></i> {{__('user.by admin')}}</span>
                                <a class="title" href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a>

                                <p>{{ $blog->short_description }}</p>

                                <a class="arr_btn" href="{{ route('blog', $blog->slug) }}">{{__('user.learn more')}} <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    @endforeach

                </div>


                    {{ $blogs->links('custom_pagination') }}

            </div>
        </div>
    </section>
    <!--==========================
        BLOG PAGE END
    ===========================-->
@endsection
