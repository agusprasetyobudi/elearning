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
                  <h4>List Kursus <small class="text-muted">{!! $course_name->course_name !!}</small></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12">

                    <div class="card-deck">
                        @foreach ($list_course as $item)
                        <div class="card">
                            <img src="https://img.youtube.com/vi/{!! $item->link_video !!}/0.jpg" class="card-img-top" >
                            <div class="card-body">
                            <h5 class="card-title">{{$item->course_name}}</h5>
                            <div style="padding-top:50px;">
                                <a href="{{route('CourseDetail',['id'=> $item->id])}}" class="btn btn-primary">Lihat Video Kursus</a>
                            </div>
                            </div>
                        </div>
                    @endforeach
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


