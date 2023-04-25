@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Why choose us')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Why choose us')}}</h1>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.why-choose-us-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')



                            <div class="row">

                                <div class="form-group col-12">
                                    <label>{{__('admin.Existing background')}}</label>
                                    <div>
                                        <img class="w_300_h_150" src="{{ asset($why_choose_us->home1_background) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.New Image')}}</label>
                                    <input type="file" name="home1_background" class="form-control-file">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Image one')}}</label>
                                    <div>
                                        <img class="icon_w100" src="{{ asset($why_choose_us->image1) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.New image')}}</label>
                                    <input type="file" name="image1" class="form-control-file">
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Image two')}}</label>
                                    <div>
                                        <img class="icon_w100" src="{{ asset($why_choose_us->image2) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.New image')}}</label>
                                    <input type="file" name="image2" class="form-control-file">
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Image three')}}</label>
                                    <div>
                                        <img class="icon_w100" src="{{ asset($why_choose_us->image3) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.New image')}}</label>
                                    <input type="file" name="image3" class="form-control-file">
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Title one')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="title1" value="{{ $why_choose_us->title1 }}" class="form-control">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Title two')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="title2" value="{{ $why_choose_us->title2 }}" class="form-control">
                                </div>


                                <div class="form-group col-12">
                                    <label>{{__('admin.Button Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="why_choose_link" value="{{ $why_choose_us->why_choose_link }}" class="form-control">
                                </div>



                                <div class="form-group col-12">
                                    <label>{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control text-area-5">{{ $why_choose_us->why_choose_description }}</textarea>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5>{{__('admin.Item one')}}</h5>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Icon')}}</label>
                                        <input type="text" name="item_icon1" class="form-control custom-icon-picker" value="{{ $why_choose_us->item_icon1 }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Title')}}</label>
                                        <input type="text" name="item_title1" class="form-control" value="{{ $why_choose_us->item_title1 }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Description')}}</label>
                                        <textarea name="item_description1" class="form-control text-area-3" id="" cols="30" rows="10">{{ $why_choose_us->item_description1 }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5>{{__('admin.Item two')}}</h5>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Icon')}}</label>
                                        <input type="text" name="item_icon2" class="form-control custom-icon-picker" value="{{ $why_choose_us->item_icon2 }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Title')}}</label>
                                        <input type="text" name="item_title2" class="form-control" value="{{ $why_choose_us->item_title2 }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Description')}}</label>
                                        <textarea name="item_description2" class="form-control text-area-3" id="" cols="30" rows="10">{{ $why_choose_us->item_description2 }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5>{{__('admin.Item three')}}</h5>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Icon')}}</label>
                                        <input type="text" name="item_icon3" class="form-control custom-icon-picker" value="{{ $why_choose_us->item_icon3 }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Title')}}</label>
                                        <input type="text" name="item_title3" class="form-control" value="{{ $why_choose_us->item_title3 }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">{{__('admin.Description')}}</label>
                                        <textarea name="item_description3" class="form-control text-area-3" id="" cols="30" rows="10">{{ $why_choose_us->item_description3 }}</textarea>
                                    </div>
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
