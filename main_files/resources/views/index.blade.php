@extends('layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('title')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('frontend-content')


    <!--==========================
        BANNER PART START
    ===========================-->
    <section id="banner" style="background: url({{ asset($slider->home1_image) }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-xxl-6 col-lg-10">
                    <div class="banner_text">
                        <h1>{{ $slider->home1_title }}</h1>
                        <p>{{ $slider->home1_description }}</p>
                        <a class="common_btn_1" href="{{ $slider->button_link }}">{{__('user.get Started')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        BANNER PART END
    ===========================-->


    <!--==========================
        WORK PART START
    ===========================-->
    <div id="work_part">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-xxl-6 col-lg-6" data-aos="fade-up-right">
                    <div class="work_text">
                        <h3 class="small_heading">{{ $how_it_work->title1 }}</h3>
                        <h2 class="medium_heading">{{ $how_it_work->title2 }}</h2>
                        {!! clean($how_it_work->description) !!}
                        <a class="read_btn" href="{{ $how_it_work->link }}">{{__('user.Learn More')}}</a>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-5 col-lg-6" data-aos="fade-up-left">
                    <div class="work_img">
                        <img src="{{ asset($how_it_work->image) }}" alt="work_logo" class="img-fluid w-100">
                        <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/{{ $how_it_work->video_id }}">
                            <i class=" fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        WORK PART END
    ===========================-->


    <!--==========================
        WHY CHOOSE START
    ===========================-->
    <div id="why_choose_part"  style="background: url({{ asset($why_choose_us->home1_background) }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6" data-aos="fade-up-right">
                    <div class="why_choose_img">
                        <img src="{{ asset($why_choose_us->image1) }}" alt="shoose" class="img-fluid w-100 img_1">
                        <img src="{{ asset($why_choose_us->image2) }}" alt="shoose" class="img-fluid w-100 img_2">
                        <img src="{{ asset($why_choose_us->image3) }}" alt="shoose" class="img-fluid w-100 img_3">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 ms-auto" data-aos="fade-up-left">
                    <div class="why_choose_text">
                        <h3 class="small_heading">{{ $why_choose_us->title1 }}</h3>
                        <h2 class="medium_heading">{{ $why_choose_us->title2 }}</h2>
                        <p>{{ $why_choose_us->why_choose_description }}</p>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="{{ $why_choose_us->item_icon1 }}"></i>
                                </div>
                                <div class="text">
                                    <h4>{{ $why_choose_us->item_title1 }}</h4>
                                    <p>{{ $why_choose_us->item_description1 }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="{{ $why_choose_us->item_icon2 }}"></i>
                                </div>
                                <div class="text">
                                    <h4>{{ $why_choose_us->item_title2 }}</h4>
                                    <p>{{ $why_choose_us->item_description2 }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="{{ $why_choose_us->item_icon3 }}"></i>
                                </div>
                                <div class="text">
                                    <h4>{{ $why_choose_us->item_title3 }}</h4>
                                    <p>{{ $why_choose_us->item_description3 }}</p>
                                </div>
                            </li>
                        </ul>
                        <a class="read_btn" href="{{ $why_choose_us->why_choose_link }}">{{__('user.learn more')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        WHY CHOOSE END
    ===========================-->


    <!--==========================
        CARD PART START
    ===========================-->
    <div id="card_part">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="heading_area">
                        <h3 class="small_heading">{{__('user.Why AI Writer')}}</h3>
                        <h2 class="medium_heading">{{__('user.Explore All Use Cases')}}</h2>
                    </div>
                </div>
            </div>
            <div class="card_area">
                <div class="row">
                    @foreach ($use_cases as $index => $use_case)
                        <div class="col-xl-4 col-sm-6 col-lg-6" data-aos="fade-up">
                            <a href="{{ route('dashboard', ['usecase' => $use_case->id]) }}" class="single_card text-center">
                                <div class="icon">
                                    <span><i class="{{ $use_case->icon }}"></i></span>
                                </div>
                                <div class="text">
                                    <h4>{{ $use_case->title }}</h4>
                                    <p>{{ $use_case->description }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        CARD PART END
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
