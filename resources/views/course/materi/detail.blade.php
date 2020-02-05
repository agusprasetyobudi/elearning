@extends('layouts.main')

@section('sidebar')
    @include('layouts.menu_course')
@endsection

@section('content')
     <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                          <h5 class="card-title"> {!! $detail->course_name !!}</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-12">
                      {{-- <p class="text-center">
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                      </p> --}}

                      <div class="row">
                          <div class="col-sm-12">
                              <div class="embed-responsive embed-responsive-5by3">
                                  <iframe class="embed-responsive-item"  src="{!! $detail->link_video !!}/preview" frameborder="0"></iframe>
                              </div>
                              <hr class="featurette-divider">
                              <h5>Deskripsi Kursus</h5>
                              <hr class="featurette-divider">
                              <p class="card-text lead">{!! $detail->description !!}</p>
                          </div>
                      </div>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>



        <!-- /.row -->
      </div><!--/. container-fluid -->
@endsection


