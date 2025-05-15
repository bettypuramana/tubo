@extends('layouts.admin.admin_layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .pl{
        margin-right: 30px;
    }
</style>
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="height: 77px;">
                  <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <h4 class="card-title mb-0">Clients</h4>
                    <a href="{{ route('add_clients') }}" class="btn btn-primary btn-sm">Add</a>
                  </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('fail'))
                        <div class="alert alert-danger mb-1 mt-1">
                            {{ session('fail') }}
                        </div>
                    @endif
                <div class="card-body">
                    <div class="table-responsive pt-3">
                    <table id="contactTable" class="table table-bordered">
                      <thead>
                        <tr>
                            <th>SlNo</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($clients))
                            @php $i = 1; @endphp
                            @foreach ($clients as $row)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->sub_title }}</td>
                                    <td><img style="width:60px;" src="{{ asset('uploads/clients/'.$row->image) }}"></td>
                                    <td>
                                            <span>
                                            <a href="{{ route('edit_clients', ['id' => $row->id]) }}" class="mr-4" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil color-muted text-warning"></i> </a>
                                                <a href="{{ route('client.projects', ['client_id' => $row->id]) }}" data-toggle="tooltip" title="Add Project"> 
                                                    <i class="fa fa-folder-plus text-success"></i> </a> 
                                            <a href="{{ route('deleteclients', ['id' => $row->id]) }}" onclick="return confirm('Are you sure you want to delete this data?')" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i
                                                    class="fa fa-trash color-danger text-danger"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection      