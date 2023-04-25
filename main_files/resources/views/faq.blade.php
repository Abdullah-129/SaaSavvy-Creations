@extends('layout')
@section('title')
    <title>{{__('user.FAQ')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.FAQ')}}">
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
                        <h4>{{__('user.FAQ')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.FAQ')}} </li>
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
        ACCORDIAN PART START
    ===========================-->
    <section id="accordion">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="heading_area">
                        <h2 class="medium_heading">{{__('user.Frequently Asked Questions')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="accordion_area">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($faqs as $index => $faq)
                            <div class="accordion-item" data-aos="fade-up">
                                <h2 class="accordion-header" id="flush-headingOne-{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne-{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="flush-collapseOne-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapseOne-{{ $faq->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne-{{ $faq->id }}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        {!! clean($faq->answer) !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        ACCORDIAN PART END
    ===========================-->
@endsection
