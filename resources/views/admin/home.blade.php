@extends('layouts.admin.admin_layout')
@section('content')
                
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">Welcome</h3>
                <p></p>
              </div>
              <div class="col-sm-6">
              
              </div>
            </div>
            <div class="row  mt-3">
              <div class="col-xl-5 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Services</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <div id="circleProgress6" class="progressbar-js-circle rounded p-3"></div>
                          </div>
                          <div class="col-lg-6">
                            <ul class="session-by-channel-legend">
                            @if (!empty($services))
                              @foreach ($services as $row)
                                <li>
                                  <div>{{ $row->title }}</div>
                                  <div></div>
                                </li>
                              @endforeach
                            @endif
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
                      <a href="{{ url('/services-list') }}" class="btn btn-primary btn-sm">View More</a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 d-flex grid-margin stretch-card">
                <div class="card d-flex flex-column w-100">
                  <div class="card-body flex-grow-1">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Contacts</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-12">
                          @if (!empty($contact))
                            @foreach ($contact as $row)
                            <div class="d-flex justify-content-between mb-md-5 mt-3">
                              <div class="small">{{ $row->name }}</div>
                              <div class="small">{{ $row->subject }}</div>
                              @if ($row->created_at)
                                  <div class="text-warning small">{{ $row->created_at->format('d-m-Y') }}</div>
                              @else
                                  <div class="text-muted small"></div>
                              @endif
                            </div>
                            @endforeach
                          @endif
                            <canvas id="eventChart"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
                    <a href="{{ url('/contact-list') }}" class="btn btn-primary btn-sm">View More</a>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Careers</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-12">
                          @if (!empty($career))
                            @foreach ($career as $row)
                            <div class="d-flex justify-content-between mb-4">
                              <div>{{ $row->name }}</div>
                              @if ($row->created_at)
                                <div class="text-muted">{{ $row->created_at->format('d-m-Y') }}</div>
                              @else
                                  <div class="text-muted small"></div>
                              @endif
                            </div>
                          @endforeach
                        @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
                    <a href="{{ url('/career-list') }}" class="btn btn-primary btn-sm">View More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
@endsection
@section('js')
@endsection      