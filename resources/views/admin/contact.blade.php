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
                    <h4 class="card-title mb-0">Contacts</h4>
                    <a href="{{ route('export.contact') }}" class="btn btn-primary btn-sm">Export to Excel</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($contact))
                            @php $i = 1; @endphp
                            @foreach ($contact as $row)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->subject }}</td>
                                    <td>{{ $row->message }}</td>
                                    <td>
                                            <span>
                                            <!-- <a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil color-muted text-warning"></i> </a> -->
                                            <a href="{{ route('deletecontact', ['id' => $row->id]) }}" data-toggle="tooltip"
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