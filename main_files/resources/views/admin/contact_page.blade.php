@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Conact Us')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Conact Us')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Conact Us')}}</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.contact-us.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>{{__('admin.Title')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ $contact->title }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="description" class="form-control" value="{{ $contact->description }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Email')}} <span class="text-danger">*</span></label>
                                    <textarea name="email" cols="30" rows="10" class="form-control text-area-5">{{ $contact->email }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Phone')}} <span class="text-danger">*</span></label>
                                    <textarea name="phone" cols="30" rows="10" class="form-control text-area-5">{{ $contact->phone }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Address')}} <span class="text-danger">*</span></label>
                                    <textarea name="address" cols="30" rows="10" class="form-control text-area-5">{{ $contact->address }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Google Map')}} <span class="text-danger">*</span></label>
                                    <textarea name="google_map" cols="30" rows="10" class="form-control text-area-5">{{ $contact->map }}</textarea>
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
