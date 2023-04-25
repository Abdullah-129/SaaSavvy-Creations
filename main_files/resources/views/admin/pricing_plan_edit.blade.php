@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Edit Pricing Plan')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Edit Pricing Plan')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.pricing-plan.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('admin.Pricing Plan')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">

                        <span class="d-block text-danger">* {{__('admin.Set 0 price for free package')}}</span>
                        <span class="d-block text-danger">* {{__('admin.Set -1 for unlimited expiration days')}}</span>
                        <br>

                        <form action="{{ route('admin.pricing-plan.update', $pricing_plan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{__('admin.Plan Name')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="plan_name" class="form-control"  value="{{ $pricing_plan->plan_name }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">{{__('admin.Price')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="plan_price" class="form-control"  value="{{ $pricing_plan->plan_price }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expiration_day">{{__('admin.Expiration day')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="expiration_day" class="form-control" value="{{ $pricing_plan->expiration_day }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="maximum_keyword_generate">{{__('admin.Maximum keyword generate')}} <span class="text-danger">*</span></label>
                                        <input type="number" name="maximum_keyword_generate" class="form-control" value="{{ $pricing_plan->maximum_keyword_generate }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="serial">{{__('admin.Serial')}} <span class="text-danger">*</span></label>
                                        <input type="number" name="serial" class="form-control" value="{{ $pricing_plan->serial }}">
                                    </div>
                                </div>

                                <div class="col-md-6 d-none">
                                    <div class="form-group">
                                        <label for="enable_image_search">{{__('admin.Enable image search')}} <span class="text-danger">*</span></label>
                                        <select name="enable_image_search" id="enable_image_search" class="form-control">
                                            <option {{ $pricing_plan->enable_image_search == 1 ? 'selected' : '' }} value="1">{{__('admin.Enable')}}</option>
                                            <option {{ $pricing_plan->enable_image_search == 0 ? 'selected' : '' }} value="0">{{__('admin.Disable')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="enable_custom_search">{{__('admin.Enable custom search')}} <span class="text-danger">*</span></label>
                                        <select name="enable_custom_search" id="enable_custom_search" class="form-control">
                                            <option {{ $pricing_plan->enable_custom_search == 1 ? 'selected' : '' }} value="1">{{__('admin.Enable')}}</option>
                                            <option {{ $pricing_plan->enable_custom_search == 0 ? 'selected' : '' }} value="0">{{__('admin.Disable')}}</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option {{ $pricing_plan->status == 1 ? 'selected' : '' }} value="1">{{__('admin.Active')}}</option>
                                            <option {{ $pricing_plan->status == 0 ? 'selected' : '' }} value="0">{{__('admin.Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">{{__('admin.Update')}}</button>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
