@extends('layout')
@section('title')
    <title>{{__('user.Change Password')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Change Password')}}">
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
                        <h4>{{__('user.Change Password')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Change Password')}} </li>
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
        <div class="container">
            <div class="wsus__dashboard_area">
                <div class="row">
                    @include('user.sidebar')

                    <div class="col-xl-9 col-lg-8">
                        <div class="wsus__dashboard_content">
                            <div class="wsus_dashboard_body">
                                <h3>{{__('user.Change Password')}}</h3>
                                <div class="wsus_dash_personal_info" data-aos="fade-up">
                                    <div class="wsus_dash_personal_info_edit">
                                        <form method="POST" action="{{ route('update-password') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="wsus__comment_imput_single">
                                                        <label>{{__('user.Current Password')}} *</label>
                                                        <input type="password" placeholder="{{__('user.Current Password')}}" name="current_password">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="wsus__comment_imput_single">
                                                        <label>{{__('user.New Password')}} *</label>
                                                        <input type="password" placeholder="New Password" name="password">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="wsus__comment_imput_single">
                                                        <label>{{__('user.Confirm Password')}} *</label>
                                                        <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                                    </div>
                                                    <button type="submit" class="read_btn">{{__('user.Update')}}</button>
                                                </div>
                                            </div>
                                        </form>
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
@endsection
