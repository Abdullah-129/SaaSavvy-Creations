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
                        <h4>{{__('user.About Us')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.About Us')}} </li>
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
        ABOUT START
    ===========================-->
    <div id="user_about" class="about about_pad">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6 col-md-12 col-lg-8" data-aos="fade-up-right">
                    <div class="about_text work_text">
                        <h3 class="small_heading">{{ $about->header1 }}</h3>
                        <h2 class="medium_heading">{{ $about->header2 }}</h2>
                        {!! clean($about->about_us) !!}
                        <div class="counter_area">
                            <div class="row">
                                <div class="col-4">
                                    <div class="single_counter">
                                        <span class="counter">{{ $about->item1_qty }}</span>
                                        <h4>{{ $about->item1_title }}</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="single_counter">
                                        <span class="counter">{{ $about->item2_qty }}</span>
                                        <h4>{{ $about->item2_title }}</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="single_counter">
                                        <span class="counter">{{ $about->item3_qty }}</span>
                                        <h4>{{ $about->item3_title }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="read_btn" href="{{ route('contact-us') }}">{{__('user.Contact Us')}}</a>
                    </div>
                </div>
                <div class="col-12 col-xl-6 col-md-12 col-lg-8" data-aos="fade-up-left">
                    <div class="about_img">
                        <img src="{{ asset($about->image) }}" alt="work_logo" class="img-fluid w-100">
                        <span>
                            <img src="{{ asset($about->image2) }}" alt="about us" class="img-fluid w-100">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        ABOUT END
    ===========================-->


    <!--==========================
      TESTIMONIAL PART START
    ===========================-->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="heading_area">
                        <h3 class="small_heading">{{__('user.Testimonial')}}</h3>
                        <h2 class="medium_heading">{{__('user.what say our clients')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row test_slider" data-aos="fade-up">
                @foreach ($testimonials as $index => $testimonial)
                    <div class="col-12">
                        <div class="single_slider">
                            <div class="row">
                                <div class="col-xl-3 col-12 col-md-3 col-lg-3">
                                    <div class="clients_img">
                                        <img src="{{ asset($testimonial->image) }}" class="img-fluid" alt="jhon deo">
                                    </div>
                                </div>
                                <div class="col-xl-9 col-12 col-md-9 col-lg-9">
                                    <div class="clients_text text-white">
                                        <p>{{ $testimonial->comment }}</p>
                                        <div class="clients_rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h3>{{ $testimonial->name }}</h3>
                                        <span>{{ $testimonial->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--==========================
       TESTIMONIAL PART END
    ===========================-->


    <!--==========================
        BLOG PART START
    ===========================-->
    <section id="blog_part">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 m-auto text-center">
                    <div class="heading_area">
                        <h3 class="small_heading"> {{__('user.Our Blog')}}</h3>
                        <h2 class="medium_heading">{{__('user.Our Recent Blog')}}</h2>
                    </div>
                </div>
            </div>
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
            </div>
        </div>
    </section>
    <!--==========================
        BLOG PART END
    ===========================-->

@endsection
