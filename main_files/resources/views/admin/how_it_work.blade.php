@extends('admin.master_layout')
@section('title')
<title>{{__('admin.How it work')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.How it work')}}</h1>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.how-it-work-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>{{__('admin.Existing background')}}</label>
                                    <div>
                                        <img class="w_300_h_150" src="{{ asset($how_it_work->image) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.New Image')}}</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Youtube video id')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="video_id" value="{{ $how_it_work->video_id }}" class="form-control">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Title one')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="title1" value="{{ $how_it_work->title1 }}" class="form-control">
                                </div>



                                <div class="form-group col-12">
                                    <label>{{__('admin.Title two')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="title2" value="{{ $how_it_work->title2 }}" class="form-control">
                                </div>


                                <div class="form-group col-12">
                                    <label>{{__('admin.Button Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="link" value="{{ $how_it_work->link }}" class="form-control">
                                </div>



                                <div class="form-group col-12">
                                    <label>{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" id="" cols="30" rows="10" class="summernote">{{ $how_it_work->description }}</textarea>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
