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
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th >{{__('admin.SN')}}</th>
                                            <th >{{__('admin.User name')}}</th>
                                            <th >{{__('admin.Pricing Plan')}}</th>
                                            <th >{{__('admin.Price')}}</th>
                                            <th >{{__('admin.Purchase Date')}}</th>
                                            <th >{{__('admin.Status')}}</th>
                                            <th >{{__('admin.Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $index => $order)
                                            <tr>
                                                <td>{{ ++$index }}</td>
                                                <td><a href="{{ route('admin.customer-show', $order->user_id) }}">{{ $order->user->name }}</a></td>
                                                <td>{{ $order->pricing_plan->plan_name }}</td>
                                                <td>{{ $currency }}{{ $order->plan_price }}</td>
                                                <td>
                                                    {{ date('d M Y',strtotime($order->purchase_date)) }}

                                                </td>
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
                                                <td>
                                                    <a href="{{ route('admin.purchase-history',$order->order_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData({{ $order->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>

                                                </td>
                                            </tr>

                                        @endforeach

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

<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/purchase-delete/") }}'+"/"+id)
    }
</script>
@endsection
