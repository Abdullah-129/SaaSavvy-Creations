@extends('layout')
@section('title')
    <title>{{__('user.Testimonial')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Testimonial')}}">
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
                        <h4>{{__('user.Testimonial')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Testimonial')}} </li>
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
        REVIEW PART START
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
        REVIEW PART END
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
