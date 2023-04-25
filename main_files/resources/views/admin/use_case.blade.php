@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Use Cases')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Use Cases')}}</h1>
          </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th >{{__('admin.SN')}}</th>
                                            <th >{{__('admin.Use Case')}}</th>
                                            <th >{{__('admin.Icon')}}</th>
                                            <th >{{__('admin.Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($use_cases as $index => $use_case)
                                            <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $use_case->title }}</td>
                                                <td> <i class=" {{ $use_case->icon }}"></i></td>

                                                <td>
                                                    <a href="{{ route('admin.use-case', $use_case->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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
