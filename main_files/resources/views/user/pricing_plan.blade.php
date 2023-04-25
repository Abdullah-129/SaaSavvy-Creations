@extends('layout')
@section('title')
    <title>{{__('user.Pricing Plan')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Pricing Plan')}}">
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
                        <h4>{{__('user.Pricing Plan')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Pricing Plan')}} </li>
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
                                <div class="wsus_dash_pricing">
                                    <h3>{{__('user.Pricing Plan')}}</h3>
                                    <div class="row">
                                        @foreach ($pricing_plans as $pricing_plan)
                                            <div class="col-xl-6 col-md-6 col-lg-6" data-aos="fade-up">
                                                <div class="member_price">
                                                    <h4>{{ $pricing_plan->plan_name }}</h4>
                                                    <h5>{{ $currency_icon->icon }}{{ $pricing_plan->plan_price }}/
                                                        @if ($pricing_plan->expiration_day == -1)
                                                            {{__('user.Lifetime')}}
                                                        @else
                                                            {{ $pricing_plan->expiration_day }}{{__('user.Days')}}
                                                        @endif
                                                        </h5>
                                                    <hr>
                                                    <ul>
                                                        <li>{{__('user.Generate')}} {{ $pricing_plan->maximum_keyword_generate }} {{__('user.AI Words')}}</li>
                                                        <li>{{__('user.14+ Use Cases')}}</li>

                                                        @if ($pricing_plan->enable_custom_search == 1)
                                                        <li>{{__('user.Custom Prompt')}}</li>
                                                        @else
                                                        <li class="del">{{__('user.Custom Prompt')}}</li>
                                                        @endif
                                                    </ul>


                                                    @if ($pricing_plan->plan_price == 0)
                                                    <a href="{{ route('free-enroll', $pricing_plan->id) }}">{{__('user.Enroll Now')}}</a>
                                                    @else
                                                    <a href="{{ route('payment', $pricing_plan->plan_slug) }}">{{__('user.Buy Now')}}</a>
                                                    @endif

                                                </div>
                                            </div>
                                        @endforeach
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
