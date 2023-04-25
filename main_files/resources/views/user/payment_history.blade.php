@extends('layout')
@section('title')
    <title>{{__('user.Payment History')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Payment History')}}">
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
                        <h4>{{__('user.Payment History')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Payment History')}} </li>
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
                                <h3>{{__('user.Payment History')}}</h3>
                                <div class="dashboard_payment wsus_dashboard_order" data-aos="fade-up">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr class="t_header">
                                                    <th>{{__('user.Plan')}}</th>
                                                    <th>{{__('user.Purchase Date')}}</th>
                                                    <th>{{__('user.Status')}}</th>
                                                    <th>{{__('user.Amount')}}</th>
                                                    <th>{{__('user.Action')}}</th>
                                                </tr>
                                                @foreach ($payment_histories as $index => $payment_history)
                                                    <tr>
                                                        <td>
                                                            <h5>{{ $payment_history->pricing_plan->plan_name }}</h5>
                                                        </td>
                                                        <td>
                                                            <p>{{ date('d M Y',strtotime($payment_history->purchase_date)) }}</p>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $current_status = 'expired';
                                                            @endphp
                                                            @if ($payment_history->status==1)
                                                                @if ($payment_history->expired_date == null)
                                                                    <span class="complete">{{__('user.Active')}}</span>
                                                                    @php
                                                                        $current_status = 'active';
                                                                    @endphp
                                                                @else
                                                                    @if (date('Y-m-d') <= $payment_history->expired_date)
                                                                        <span class="complete">{{__('user.Active')}}</span>
                                                                        @php
                                                                            $current_status = 'active';
                                                                        @endphp
                                                                    @else
                                                                        <span class="cancel">{{__('user.Expired')}}</span>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                <span class="cancel">{{__('user.Expired')}}</span>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <h5>{{ $currency_icon->icon }}{{ $payment_history->plan_price }}</h5>
                                                        </td>
                                                        <td><a data-payment-history="{{ $payment_history }}" data-currency-icon="{{ $currency_icon->icon }}"
                                                            data-purchase-date="{{ date('d M Y',strtotime($payment_history->purchase_date)) }}"
                                                            data-expired-date="{{ date('d M Y',strtotime($payment_history->expired_date)) }}"
                                                            data-current-status="{{ $current_status }}"
                                                            class="view_invoice">{{__('user.View')}}</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="wsus__invoice">
                                    <a class="go_back"><i class="fas fa-long-arrow-alt-left"></i> {{__('user.go back')}}</a>
                                    <div class="wsus__invoice_body">
                                        <div class="table-responsive" id="purchase_details">

                                        </div>
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



<script>
    (function($) {
    "use strict";
    $(document).ready(function () {
        $(".view_invoice").on("click", function(){
            let order = $(this).data('payment-history');
            let currency_icon = $(this).data('currency-icon');
            let purchase_date = $(this).data('purchase-date');
            let expired_date = $(this).data('expired-date');
            let current_status = $(this).data('current-status');
            let enable_custom_search = '';
            if(order.enable_custom_search == 1){
                enable_custom_search = '<span class="complete">{{__('user.Enable')}}</span>';
            }else{
                enable_custom_search = '<span class="cancel">{{__('user.Disable')}}</span>';
            }
            let current_status_check = '';
            if(current_status == 'active'){
                current_status_check = '<span class="complete">{{__('user.Active')}}</span>';
            }else{
                current_status_check = '<span class="cancel">{{__('user.Expired')}}</span>';
            }

            let expiration_days = '';
            if(order.expiration_day == -1){
                expiration_days = "{{__('user.Lifetime')}}"
            }else{
                expiration_days = order.expiration_day +"{{__('user.Days')}}"
            }

            let lifetime_text = "{{__('user.Lifetime')}}";

            let invoice_html =
            `<table class="table table-striped">
                <tbody>
                    <tr>
                        <td>{{__('user.Pricing Plan')}}</td>
                        <td>${order.pricing_plan.plan_name}</td>
                    </tr>

                    <tr>
                        <td>{{__('user.Price')}}</td>
                        <td> ${currency_icon}${order.plan_price}</td>
                    </tr>

                    <tr>
                        <td>{{__('user.Purchase Date')}}</td>
                        <td>${purchase_date}</td>
                    </tr>

                    <tr>
                        <td>{{__('user.Expired Date')}}</td>
                        <td>${order.expiration_day == -1 ? lifetime_text : expired_date}</td>
                    </tr>

                    <tr>
                        <td>{{__('user.Expiration days')}}</td>
                        <td>${ expiration_days }</td>
                    </tr>

                    <tr>
                        <td>{{__('user.Maximum keyword generate')}}</td>
                        <td>${ order.maximum_keyword_generate }</td>
                    </tr>

                    <tr>
                        <td>{{__('user.Enable custom search')}}</td>
                        <td>
                            ${enable_custom_search}
                        </td>
                    </tr>

                    <tr>
                        <td>{{__('user.Status')}}</td>
                        <td>
                            ${current_status_check}
                        </td>
                    </tr>

                    <tr>
                        <td>{{__('user.Payment Method')}}</td>
                        <td>
                            ${order.payment_method}
                        </td>
                    </tr>

                    <tr>
                        <td>{{__('user.Transaction')}}</td>
                        <td>
                            ${order.transection_id}
                        </td>
                    </tr>

                </tbody>
            </table>`;

            $("#purchase_details").html(invoice_html)

        })
    });

    })(jQuery);
</script>
@endsection
