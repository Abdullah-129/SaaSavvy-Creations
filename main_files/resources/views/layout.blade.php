@php
    $setting = App\Models\Setting::select('logo','footer_logo','favicon','topbar_phone','topbar_email','opening_time','selected_theme','text_direction')->first();
    $social_icons = App\Models\FooterSocialLink::select('icon','link')->get();
    $custom_pages = App\Models\CustomPage::where('status',1)->get();
    $googleAnalytic = App\Models\GoogleAnalytic::first();
    $facebookPixel = App\Models\FacebookPixel::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    @yield('title')
    @yield('meta')
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/summernote.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    @if ($setting->text_direction == 'rtl')
    <link rel="stylesheet" href="{{ asset('frontend/css/rtl.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.6.3.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('frontend/js/sweetalert2@11.js') }}"></script>

    <script src="{{ asset('backend/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    @if ($googleAnalytic->status == 1)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $googleAnalytic->analytic_id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $googleAnalytic->analytic_id }}');
    </script>
    @endif

    @if ($facebookPixel->status == 1)
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $facebookPixel->app_id }}');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{ $facebookPixel->app_id }}&ev=PageView&noscript=1"
    /></noscript>
    @endif

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>

</head>

<body>

    <!--==========================
        MENU PART START
    ===========================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset($setting->logo) }}" alt="AI TECHY" class="img-fluid w-100 logo_white">
                <img src="{{ asset($setting->footer_logo) }}" alt="AI TECHY" class="img-fluid w-100 logo_blue">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="far fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">{{__('user.Home')}}</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">{{__('user.About Us')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pricing-plan') }}">{{__('user.pricing Plan')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">{{__('user.pages')}} <i class="far fa-angle-down"></i></a>
                        <ul class="droap_menu">

                            <li><a href="{{ route('faq') }}">{{__('user.FAQ')}}</a></li>
                            <li><a href="{{ route('testimonial') }}">{{__('user.testimonial')}}</a></li>
                            <li><a href="{{ route('privacy-policy') }}">{{__('user.Privacy Policy')}}</a></li>
                            <li><a href="{{ route('terms-and-conditions') }}">{{__('user.Terms And Conditions')}}</a></li>
                            @foreach ($custom_pages as $custom_page)
                            <li><a href="{{ route('page', $custom_page->slug) }}">{{ $custom_page->page_name }}</a></li>

                            @endforeach

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs') }}">{{__('user.Blogs')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">{{__('user.contact')}}</a>
                    </li>
                </ul>
                <ul class="d-flex menu_right">
                    @auth('web')
                    <li><a href="{{ route('dashboard') }}">{{__('user.AI Write')}}</a></li>
                    @else
                    <li><a href="{{ route('login') }}">{{__('user.AI Write')}}</a></li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
    <!--==========================
        MENU PART END
    ===========================-->

    @yield('frontend-content')

@php
    $setting = App\Models\Setting::select('logo','footer_logo')->first();
    $social_icons = App\Models\FooterSocialLink::select('icon','link')->get();
    $footer_informations = App\Models\Footer::first();
    $tawk_setting = App\Models\TawkChat::first();
    $cookie_consent = App\Models\CookieConsent::first();
@endphp


    <!--==========================
       SUBSCRIBE PART START
    ===========================-->
    <section id="subscribe">
        <div class="container">
            <div class="subscribe_bg">
                <div class="subscribe_bg_overlay">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="subs_text">
                                <h3>{{__('user.Get the updates & offers')}}</h3>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="subs_form">
                                <form id="subscriberForm">
                                    @csrf
                                    <input type="email" placeholder="{{__('user.Email')}}" name="email">
                                    <button id="subscribe_btn" type="submit">{{__('user.Subscribe')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
       SUBSCRIBE PART END
    ===========================-->


    <!--==========================
        FOOTER PART START
    ===========================-->

    <footer class="foot_mar RTL_footer" style="background: url({{ asset($footer_informations->payment_image) }});">
        <div class="foot_overlay">
            <div class="container">
                <div class="row text-white justify-content-between">
                    <div class="col-xl-3 col-md-7 col-lg-3 ">
                        <div class="footer_text">
                            <h3>{{__('user.About Us')}}</h3>
                            <p>{{ $footer_informations->about_us }}</p>
                            <ul class="footer_icon">
                                @foreach ($social_icons as $social_icon)
                                    <li><a target="_blank" href="{{ $social_icon->link }}"><i class="{{ $social_icon->icon }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-7 col-lg-2 ">
                        <div class="footer_text">
                            <h3>{{__('user.My Account')}}</h3>
                            <ul class="footer_link">
                                <li><a href="{{ route('dashboard') }}">{{__('user.AI Write')}}</a></li>
                                <li><a href="{{ route('my-profile') }}">{{__('user.My Profile')}}</a></li>
                                <li><a href="{{ route('change-password') }}">{{__('user.Change Password')}}</a></li>
                                <li><a href="{{ route('ai-history') }}">{{__('user.AI History')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-7 col-lg-2 ">
                        <div class="footer_text">
                            <h3>{{__('user.Helpful Links')}}</h3>
                            <ul class="footer_link">
                                <li><a href="{{ route('about-us') }}">{{__('user.About Us')}}</a></li>
                                <li><a href="{{ route('contact-us') }}">{{__('user.Contact Us')}}</a></li>
                                <li><a href="{{ route('privacy-policy') }}">{{__('user.Privacy Policy')}}</a></li>
                                <li><a href="{{ route('terms-and-conditions') }}">{{__('user.Terms And Conditions')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-7 col-lg-4 ">
                        <div class="footer_text footer_address">
                            <h3>{{__('user.Contact Us')}}</h3>
                            <p><span><i class="far fa-map-marker-alt"></i></span> {{ $footer_informations->address }}</p>
                            <p><span><i class="far fa-phone-alt"></i></span> {{ $footer_informations->phone }}</p>
                            <p><span><i class="fal fa-envelope"></i></span> {{ $footer_informations->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p>{{ $footer_informations->copyright }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--==========================
        FOOTER PART END
    ===========================-->


    <!--=============SCROLL BTN==============-->
    <div class="scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--=============SCROLL BTN==============-->


    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--slick js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--nice select js-->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <!--aos js-->
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <!--summer note js-->
    <script src="{{ asset('frontend/js/summernote.min.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="{{ asset('toastr/toastr.min.js') }}"></script>


    <script>
        @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
    @endif

    @if ($cookie_consent->status == 1)
    <script src="{{ asset('frontend/js/cookieconsent.min.js') }}"></script>

    <script>
    window.addEventListener("load",function(){window.wpcc.init({"border":"{{ $cookie_consent->border }}","corners":"{{ $cookie_consent->corners }}","colors":{"popup":{"background":"{{ $cookie_consent->background_color }}","text":"{{ $cookie_consent->text_color }} !important","border":"{{ $cookie_consent->border_color }}"},"button":{"background":"{{ $cookie_consent->btn_bg_color }}","text":"{{ $cookie_consent->btn_text_color }}"}},"content":{"href":"{{ route('privacy-policy') }}","message":"{{ $cookie_consent->message }}","link":"{{ $cookie_consent->link_text }}","button":"{{ $cookie_consent->btn_text }}"}})});
    </script>
    @endif



    @if ($tawk_setting->status == 1)
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='{{ $tawk_setting->chat_link }}';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>

    @endif

    <script>
        (function($) {
            "use strict";
            $(document).ready(function () {

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });

                $("#subscriberForm").on('submit', function(e){
                    e.preventDefault();
                    var isDemo = "{{ env('APP_MODE') }}"
                    if(isDemo == 'DEMO'){
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    let loading = "{{__('user.Processing...')}}"

                    $("#subscribe_btn").html(loading);
                    $("#subscribe_btn").attr('disabled',true);

                    $.ajax({
                        type: 'POST',
                        data: $('#subscriberForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function (response) {
                            if(response.status == 1){
                                toastr.success(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#subscribe_btn").html(subscribe);
                                $("#subscribe_btn").attr('disabled',false);
                                $("#subscriberForm").trigger("reset");
                            }

                            if(response.status == 0){
                                toastr.error(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#subscribe_btn").html(subscribe);
                                $("#subscribe_btn").attr('disabled',false);
                                $("#subscriberForm").trigger("reset");
                            }
                        },
                        error: function(err) {
                            toastr.error('Something went wrong');
                            let subscribe = "{{__('user.Subscribe')}}"
                                $("#subscribe_btn").html(subscribe);
                                $("#subscribe_btn").attr('disabled',false);
                                $("#subscriberForm").trigger("reset");
                        }
                    });
                })

            });
        })(jQuery);


    </script>

</body>

</html>
