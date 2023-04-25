
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
                        <h4>{{__('user.Contact Us')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Contact Us')}} </li>
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
        GET IN TOUCH START
    ===========================-->
    <section id="get_in_touch" class="contact_mar">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-12 col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="contact_box">
                        <div class="contact_box_icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact_box_text">
                            {!! clean(nl2br($contact->phone)) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12 col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="contact_box">
                        <div class="contact_box_icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact_box_text">
                            {!! clean(nl2br($contact->email)) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12 col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="contact_box">
                        <div class="contact_box_icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact_box_text">
                            {!! clean(nl2br($contact->address)) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="ger_in_area">
                <div class="row">
                    <div class="col-xl-7">
                        <form method="POST" action="{{ route('send-contact-message') }}">
                            @csrf
                            <h3>{{__('user.If You Any Question Please Send Message To Us.')}}</h3>
                            <div class="row">

                                <div class="col-xl-6 col-12 col-md-6" data-aos="fade-left">
                                    <input type="text" placeholder="{{__('user.Name')}} *" name="name">
                                </div>
                                <div class="col-xl-6 col-12 col-md-6" data-aos="fade-right">
                                    <input type="email" placeholder="{{__('user.Email')}}*" name="email">
                                </div>
                                <div class="col-xl-6 col-12 col-md-6" data-aos="fade-left">
                                    <input type="text" placeholder="{{__('user.Phone')}}" name="phone">
                                </div>
                                 <div class="col-xl-6 col-12 col-md-6" data-aos="fade-left">
                                    <input type="text" placeholder="{{__('user.Subject')}} *" name="subject">
                                </div>

                                <div class="col-12" data-aos="fade-up">
                                    <textarea cols="30" rows="5" name="message" placeholder="{{__('user.Message')}} *"></textarea>
                                </div>

                                @if($recaptchaSetting->status==1)
                                    <div class="col-12 mb-3" data-aos="fade-up">
                                        <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                    </div>
                                @endif

                                <div class="co-12" data-aos="fade-up">
                                    <button class="read_btn" type="submit">{{__('user.Send Massage')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-5" data-aos="fade-up">
                        <div class="contact_map">
                            {!! $contact->map !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        GET IN TOUCH END
    ===========================-->

@endsection
