@extends('admin.master_layout')
@section('title')
<title>{{__('admin.About Us')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.About Us')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.About Us')}}</div>
            </div>
          </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-about-us') }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <label for="">{{__('admin.Existing image')}}</label>
                                        <div>
                                            <img class="w_220"  src="{{ asset($about->image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.New image')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Existing image 2')}}</label>
                                        <div>
                                            <img class="w_220"  src="{{ asset($about->image2) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.New image')}}</label>
                                        <input type="file" name="image2" class="form-control-file">
                                    </div>



                                    <div class="form-group">
                                        <label for="">{{__('admin.Header one')}}</label>
                                        <input type="text" name="header1" class="form-control" value="{{ $about->header1 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Header two')}}</label>
                                        <input type="text" name="header2" class="form-control" value="{{ $about->header2 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Header three')}}</label>
                                        <input type="text" name="header3" class="form-control" value="{{ $about->header3 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.About Us')}}</label>
                                        <textarea name="about_us" id="" class="summernote" cols="30" rows="10">{!! clean($about->about_us) !!}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{__('admin.Item1 title')}}</label>
                                                <input type="text" name="item1_title" class="form-control" value="{{ $about->item1_title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{__('admin.Item1 quantity')}}</label>
                                                <input type="text" name="item1_qty" class="form-control" value="{{ $about->item1_qty }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{__('admin.Item2 title')}}</label>
                                                <input type="text" name="item2_title" class="form-control" value="{{ $about->item2_title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{__('admin.Item2 quantity')}}</label>
                                                <input type="text" name="item2_qty" class="form-control" value="{{ $about->item2_qty }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{__('admin.Item3 title')}}</label>
                                                <input type="text" name="item3_title" class="form-control" value="{{ $about->item3_title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{__('admin.Item3 quantity')}}</label>
                                                <input type="text" name="item3_qty" class="form-control" value="{{ $about->item3_qty }}">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{__('admin.Update')}}</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
@endsection
