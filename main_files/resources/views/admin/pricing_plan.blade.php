@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Pricing Plan')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Pricing Plan')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Pricing Plan')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.pricing-plan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{__('admin.Add New')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th >{{__('admin.Serial')}}</th>
                                    <th >{{__('admin.Name')}}</th>
                                    <th >{{__('admin.Price')}}</th>
                                    <th >{{__('admin.Expiration Day')}}</th>
                                    <th >{{__('admin.Status')}}</th>
                                    <th >{{__('admin.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pricing_plans as $index => $pricing_plan)
                                    <tr>
                                        <td>{{ $pricing_plan->serial }}</td>
                                        <td>{{ $pricing_plan->plan_name }}</td>
                                        <td>{{ $currency }}{{ $pricing_plan->plan_price }}</td>
                                        <td>
                                            @if ($pricing_plan->expiration_day == -1)
                                                {{__('admin.Unlimited')}}
                                            @else
                                            {{ $pricing_plan->expiration_day }}{{__('admin.Days')}}
                                            @endif

                                        </td>
                                        <td>
                                            @if ($pricing_plan->status==1)
                                                <span class="badge badge-success">{{__('admin.Active')}}</span>
                                            @else
                                                <span class="badge badge-danger">{{__('admin.Inactive')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.pricing-plan.edit',$pricing_plan->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit    "></i></a>

                                            <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData({{ $pricing_plan->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>

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
        </section>
      </div>


<!-- Modal -->
<div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                    <div class="modal-body">
                        {{__('admin.You can not delete this Plan. Because there are one or more subsriptions has been created in this plan.')}}
                    </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('admin.Close')}}</button>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/pricing-plan/") }}'+"/"+id)
    }

</script>
@endsection
