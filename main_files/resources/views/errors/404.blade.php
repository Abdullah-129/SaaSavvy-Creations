@php
    $error_404=App\Models\ErrorPage::find(1);
@endphp

@extends('layout')
@section('title')
    <title>404</title>
@endsection
@section('meta')
<title>404</title>
@endsection

@section('frontend-content')

    <!--=============================
        404 PAGE START
    ==============================-->
    <section class="wsus__404">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-8 col-lg-6 m-auto" data-aos="fade-up">
                    <div class="wsus__404_text">
                        <div class=" img">
                        <img src="{{ asset($error_404->image) }}" alt="404" class="img-fluid w-100">
                    </div>
                    <p>{{ $error_404->title }}</p>

                    <a class="common_btn" href="{{ route('home') }}">{{__('user.Back to Home')}}</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--=============================
        404 PAGE END
    ==============================-->

@endsection
