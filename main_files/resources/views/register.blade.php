@extends('layout')
@section('title')
    <title>{{__('user.Register')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Register')}}">
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
                        <h4>{{__('user.Register')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Register')}} </li>
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
        LOGON PART START
    ===========================-->
    <section id="logon">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10 col-lg-8" data-aos="fade-up">
                    <div class="login_form">
                        <form method="POST" action="{{ route('store-register') }}">
                            @csrf
                            <h4>{{__('user.Register Here')}}</h4>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input class="form-control form-control-lg" type="text" name="name"
                                        placeholder="{{__('user.Name')}} *">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input class="form-control form-control-lg" type="email" name="email"
                                        placeholder="{{__('user.Email')}} *">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input class="form-control form-control-lg" type="password" name="password"
                                        placeholder="{{__('user.Password')}} *">
                                </div>
                            </div>

                            @if($recaptchaSetting->status==1)
                                <div class="wsus__single_com mt_20">
                                    <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                </div>
                            @endif


                            <button class="read_btn" type="submit">{{__('user.Register')}}</button>

                            @if ($socialLogin->is_gmail == 1 || $socialLogin->is_facebook == 1)
                                <p class="or">{{__('user.or')}}</p>
                                <ul class="login_link">
                                    @if ($socialLogin->is_gmail == 1)
                                        <li><a href="{{ route('login-google') }}"><i class="fab fa-google"></i></a>
                                        </li>
                                    @endif

                                    @if ($socialLogin->is_facebook == 1)
                                        <li><a href="{{ route('login-facebook') }}"><i class="fab fa-facebook-f"></i> </a></li>
                                    @endif
                                </ul>
                            @endif
                            <p class="register">{{__('user.Already have an account ?')}} <a href="{{ route('login') }}">{{__('user.Login')}}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        LOGON PART END
    ===========================-->
@endsection
