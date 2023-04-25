@extends('layout')
@section('title')
    <title>{{ $page->page_name }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $page->page_name }}">
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
                        <h4>{{ $page->page_name }}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{ $page->page_name }} </li>
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


        <!--================================
        TERMS AND CONDITION START
    =================================-->
    <section class="wsus__terms_condition">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__terms_condition_text">
                        {!! clean($page->description) !!}

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================================
        TERMS AND CONDITION END
    =================================-->
@endsection
