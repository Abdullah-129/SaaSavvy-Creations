@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Purchase History')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Purchase History')}}</h1>
          </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <tbody>

                                        <tr>
                                            <td>{{__('admin.User name')}}</td>
                                            <td><a href="{{ route('admin.customer-show', $order->user_id) }}">{{ $order->user->name }}</a> </td>
                                        </tr>

                                        <tr>
                                            <td>{{__('admin.Pricing Plan')}}</td>
                                            <td>{{ $order->pricing_plan->plan_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('admin.Price')}}</td>
                                            <td>{{ $currency }}{{ $order->plan_price }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('admin.Purchase Date')}}</td>
                                            <td>{{ date('d M Y',strtotime($order->purchase_date)) }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('admin.Expired Date')}}</td>
                                            <td>
                                                @if ($order->expiration_day == -1)
                                                {{__('admin.Lifetime')}}
                                                @else
                                                {{ date('d M Y',strtotime($order->expired_date)) }}
                                                @endif


                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{__('admin.Expiration days')}}</td>
                                            <td>
                                                @if ($order->expiration_day == -1)
                                                {{__('admin.Lifetime')}}
                                                @else
                                                {{ $order->expiration_day }}{{__('admin.Days')}}
                                                @endif

                                            </td>
                                        </tr>



                                        <tr>
                                            <td>{{__('admin.Maximum keyword generate')}}</td>
                                            <td>{{ $order->maximum_keyword_generate }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('admin.Enable custom search')}}</td>
                                            <td>
                                                @if ($order->enable_custom_search == 1)
                                                    <span class="badge badge-success">{{__('admin.Enable')}}</span>
                                                @else
                                                <span class="badge badge-danger">{{__('admin.Disable')}}</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{__('admin.Status')}}</td>
                                            <td>
                                                @if ($order->status==1)
                                                    @if ($order->expired_date == null)
                                                        <span class="badge badge-success">{{__('admin.Active')}}</span>
                                                    @else
                                                        @if (date('Y-m-d') <= $order->expired_date)
                                                            <span class="badge badge-success">{{__('admin.Active')}}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{__('admin.Expired')}}</span>
                                                        @endif
                                                    @endif
                                                @else
                                                <span class="badge badge-danger">{{__('admin.Expired')}}</span>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
@endsection
