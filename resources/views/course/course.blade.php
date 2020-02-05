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
                <div class="card-header" style="float:center;">
                  <h5 class="card-title">Silahkan Pilih Self Learning</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    {{-- <div class="col-xl-12" style="padding-bottom: 2%">
                        <h4 class="text-center" style="padding-top: 5%">Hai <strong>{!! $name_user !!}</strong>, Selamat Datang Di Aplikasi Kursus {!! $company_name['0']->app_name !!}</h4>

                      <!-- /.chart-responsive -->
                    </div> --}}

                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body text-center"  style="font-size: 24px;">
                              {{-- <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                              <a href="{!! route('MateriCourseList') !!}" style="color:black;"><i class="fas fa-file-alt fa-10x"></i><p>Materi</p></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body text-center" style="font-size: 24px;">
                              {{-- <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                              <a href="{!! route('VideoCourseIndex') !!}" style="color:black;"><i class="fas fa-file-video fa-10x"></i><p>Video</p></a>
                            </div>
                          </div>
                        </div>

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


