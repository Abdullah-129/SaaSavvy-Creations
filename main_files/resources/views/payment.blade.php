@extends('layout')
@section('title')
    <title>{{__('user.Payment')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Payment')}}">
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
                        <h4>{{__('user.Payment')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.Payment')}} </li>
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
        CHECKOUT START
    ===========================-->
    <section class="wsus__checkout">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4" data-aos="fade-right">
                    <div class="wsus__pay_method">
                        <h5>{{__('user.payment method')}}</h5>
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @if ($stripe->status == 1)
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">{{__('user.Stripe')}}</button>
                                @endif

                                @if ($paypal->status == 1)
                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">{{__('user.paypal')}}</button>
                                @endif

                                @if ($razorpay->status == 1)
                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-messages" type="button" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">{{__('user.RazorPay')}}</button>

                                @endif

                                @if ($flutterwave->status == 1)
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings" type="button" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="false">{{__('user.Flutterwave')}}</button>
                                @endif

                                @if ($mollie->mollie_status ==1)
                                    <button class="nav-link" id="v-pills-settings-tab2" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings2" type="button" role="tab"
                                    aria-controls="v-pills-settings2" aria-selected="false">{{__('user.Mollie')}}</button>
                                @endif

                                @if ($paystack->paystack_status == 1)
                                <button class="nav-link" id="v-pills-settings-tab3" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings3" type="button" role="tab"
                                    aria-controls="v-pills-settings3" aria-selected="false">{{__('user.Paystack')}}</button>

                                @endif

                                @if ($instamojoPayment->status == 1)
                                <button class="nav-link" id="v-pills-settings-tab30" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings30" type="button" role="tab"
                                    aria-controls="v-pills-settings30" aria-selected="false">{{__('user.Instamojo')}}</button>

                                @endif

                                @if ($bankPayment->status == 1)
                                <button class="nav-link" id="v-pills-settings-tab31" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings31" type="button" role="tab"
                                    aria-controls="v-pills-settings31" aria-selected="false">{{__('user.Bank Payment')}}</button>

                                @endif




                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-8" data-aos="fade-up">
                    <div class="wsus__pay_details">
                        <h5>{{__('user.payment details')}}</h5>
                        <div class="tab-content" id="v-pills-tabContent">
                            @if ($stripe->status == 1)
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="wsus__pay_card">
                                        <form role="form" action="{{ route('pay-with-stripe', $pricing_plan->id) }}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ $stripe->stripe_key }}" id="payment-form">
                                            @csrf

                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label>{{__('user.Card Number')}}</label>
                                                    <input type="text" class="card-number" name="card_number" autocomplete="off">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>{{__('user.Expiration Month')}}</label>
                                                    <input type="number" class="card-expiry-month" name="month" autocomplete="off">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>{{__('user.Expiration Year')}}</label>
                                                    <input type="number" class="card-expiry-year" name="year" autocomplete="off">
                                                </div>

                                                <div class="col-xl-12">
                                                    <label>{{__('user.CVC')}}</label>
                                                    <input type="text" class="card-cvc" name="cvc" autocomplete="off">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="read_btn">{{__('user.payment')}}</button>
                                                </div>

                                                <div class='error d-none form-group '>
                                                    <div class='alert-danger alert m-0 mt-4'>{{__('user.Please provide your valid card information')}}</div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @if ($paypal->status == 1)
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">

                                    <a href="{{ route('pay-with-paypal', $pricing_plan->id) }}" class="read_btn">{{__('user.Pay with Paypal')}}</a>
                                </div>
                            @endif

                            @if ($razorpay->status == 1)
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">

                                    <a href="javascript:;" id="razorpayBtn" class="read_btn">{{__('user.Pay with razorpay')}}</a>
                                </div>

                                <form action="{{ route('pay-with-razorpay', $pricing_plan->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @php
                                        $payable_amount = $pricing_plan->plan_price * $razorpay->currency_rate;
                                        $payable_amount = round($payable_amount, 2);
                                    @endphp
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ $razorpay->key }}"
                                            data-currency="{{ $razorpay->currency_code }}"
                                            data-amount= "{{ $payable_amount * 100 }}"
                                            data-buttontext="{{__('user.Payment')}}"
                                            data-name="{{ $razorpay->name }}"
                                            data-description="{{ $razorpay->description }}"
                                            data-image="{{ asset($razorpay->image) }}"
                                            data-prefill.name=""
                                            data-prefill.email=""
                                            data-theme.color="{{ $razorpay->color }}">
                                    </script>
                                </form>

                            @endif


                            @if ($flutterwave->status == 1)
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">

                                <a href="javascript:;" onclick="flutterwavePayment()" class="read_btn">{{__('user.Pay with flutterwave')}}</a>
                            </div>
                            @endif

                            @if ($mollie->mollie_status ==1)
                            <div class="tab-pane fade" id="v-pills-settings2" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab2">

                                <a href="{{ route('pay-with-mollie', $pricing_plan->id) }}" class="read_btn">{{__('user.Pay with mollie')}}</a>
                            </div>
                            @endif

                            @if ($paystack->paystack_status == 1)
                            <div class="tab-pane fade" id="v-pills-settings3" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab3">

                                <a onclick="payWithPaystack()" href="javascript:;" class="read_btn">{{__('user.Pay with paystack')}}</a>
                            </div>
                            @endif

                            @if ($instamojoPayment->status == 1)
                            <div class="tab-pane fade" id="v-pills-settings30" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab30">
                                <a  href="{{ route('pay-with-instamojo', $pricing_plan->id) }}" class="read_btn">{{__('user.Pay with Instamojo')}}</a>
                            </div>
                            @endif

                            @if ($bankPayment->status == 1)
                            <div class="tab-pane fade" id="v-pills-settings31" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab31">
                                <p>{!! clean(nl2br($bankPayment->account_info)) !!}</p>

                                <form action="{{ route('bank-payment', $pricing_plan->id) }}" method="POST">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-xl-12">
                                            <label>{{__('user.Transaction Information')}}</label>
                                            <textarea name="tnx_info" id="" cols="30" rows="7" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="read_btn">{{__('user.payment')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif






                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-left">
                    <div class="wsus__package_details">
                        <h5>{{__('user.Pricing Plan')}}</h5>
                        <div class="member_price">
                            <h4>{{ $pricing_plan->plan_name }}</h4>
                            <h5>{{ $currency }}{{ $pricing_plan->plan_price }}/
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        CHECKOUT END
    ===========================-->

{{-- start stripe payment --}}
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                    'input[type=text]', 'input[type=file]',
                                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }


            $("#razorpayBtn").on("click", function(){
                $(".razorpay-payment-button").click();
            })
        });
    </script>
{{-- end stripe payment --}}


{{-- start flutterwave payment --}}
<script src="https://checkout.flutterwave.com/v3.js"></script>
@php
    $payable_amount = $pricing_plan->plan_price * $flutterwave->currency_rate;
    $payable_amount = round($payable_amount, 2);

@endphp

<script>
    function flutterwavePayment() {

        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }

        FlutterwaveCheckout({
            public_key: "{{ $flutterwave->public_key }}",
            tx_ref: "RX1",
            amount: {{ $payable_amount }},
            currency: "{{ $flutterwave->currency_code }}",
            country: "{{ $flutterwave->country_code }}",
            payment_options: " ",
            customer: {
            email: "{{ $user->email }}",
            phone_number: "{{ $user->phone }}",
            name: "{{ $user->name }}",
            },
            callback: function (data) {

                var tnx_id = data.transaction_id;
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    type: 'post',
                    data : {tnx_id,_token},
                    url: "{{ url('pay-with-flutterwave') }}" + "/" + "{{ $pricing_plan->id }}",
                    success: function (response) {
                        if(response.status == 'success'){
                            toastr.success(response.message);
                            window.location.href = "{{ route('dashboard') }}";
                        }else{
                            toastr.error(response.message);
                            window.location.reload();
                        }
                    },
                    error: function(err) {
                        window.location.reload();
                    }
                });
            },
            customizations: {
            title: "{{ $flutterwave->title }}",
            logo: "{{ asset($flutterwave->logo) }}",
            },
        });



    }
</script>
{{-- end flutterwave payment --}}



{{-- paystack start --}}


<script src="https://js.paystack.co/v1/inline.js"></script>
@php
    $public_key = $paystack->paystack_public_key;
    $currency = $paystack->paystack_currency_code;
    $currency = strtoupper($currency);

    $ngn_amount = $pricing_plan->plan_price * $paystack->paystack_currency_rate;
    $ngn_amount = $ngn_amount * 100;
    $ngn_amount = round($ngn_amount);
@endphp
<script>
function payWithPaystack(){
    var isDemo = "{{ env('APP_MODE') }}"
    if(isDemo == 'DEMO'){
        toastr.error('This Is Demo Version. You Can Not Change Anything');
        return;
    }

    var handler = PaystackPop.setup({
        key: '{{ $public_key }}',
        email: '{{ $user->email }}',
        amount: '{{ $ngn_amount }}',
        currency: "{{ $currency }}",
        callback: function(response){
        let reference = response.reference;
        let tnx_id = response.transaction;
        let _token = "{{ csrf_token() }}";
        $.ajax({
            type: "get",
            data: {reference, tnx_id, _token},
            url: "{{ url('pay-with-paystack') }}" + "/" + "{{ $pricing_plan->id }}",
            success: function(response) {
                if(response.status == 'success'){
                    toastr.success(response.message);
                    window.location.href = "{{ route('dashboard') }}";
                }else{
                    toastr.error(response.message);
                    window.location.reload();
                }
            },
            error: function(response){
                    toastr.error('Server Error');
                    window.location.reload();
            }
        });
        },
        onClose: function(){
            alert('window closed');
        }
    });
    handler.openIframe();
}
</script>

@endsection
