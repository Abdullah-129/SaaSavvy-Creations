@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Edit use case')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Edit use case')}}</h1>
          </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-use-case', $use_case->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">{{__('admin.Icon')}}</label>
                                        <input type="text" name="icon" class="form-control custom-icon-picker" autocomplete="off" value="{{ $use_case->icon }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Title')}}</label>
                                        <input type="text" name="title" class="form-control" value="{{ $use_case->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Description')}}</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control text-area-5">{{ $use_case->description }}</textarea>
                                    </div>

                                    <button class="btn btn-primary" type="submit">{{__('admin.Update')}}</button>
                                </form>

                            </div>
                          </div>
                    </div>
                </div>
            </div>

        </section>
      </div>


@endsection
