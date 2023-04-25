@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Banner Image')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Banner Image')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Banner Image')}}</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.banner-image.update',$banner_image->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">{{__('admin.Existing Banner')}}</label>
                                <div>
                                    <img src="{{ asset($banner_image->image) }}" width="300" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">{{__('admin.New Banner')}}</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>

                            <div class="form-group">
                                <label for="">{{__('admin.Existing foreground')}}</label>
                                <div>
                                    <img src="{{ asset($banner_image->foreground_image) }}" width="300" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">{{__('admin.New foreground')}}</label>
                                <input type="file" class="form-control-file" name="foreground_image">
                            </div>
                            <button class="btn btn-primary" type="submit">{{__('admin.Update')}}</button>
                        </form>

                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
