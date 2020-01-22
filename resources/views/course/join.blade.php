@extends('layouts.adminApp')

@section('sidebar')
    @include('layouts.menu_course')
@endsection

@section('content')
     <div class="container-fluid">
        <!-- Info boxes -->

        {{-- <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="embed-responsive embed-responsive-5by3">
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/{!!  !!}" frameborder="0"></iframe>
                            </div>
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
        </div> --}}

        <div class="card-deck">
            @foreach ($list_course as $item)
            <div class="card">
                <img src="https://img.youtube.com/vi/{!! $item->link_video !!}/0.jpg" class="card-img-top" >
                <div class="card-body">
                <h5 class="card-title">{{$item->course_name}}</h5>
                <p class="card-text">{{$item->description}}</p>
                <a href="{{route('CourseDetail',['id'=> $item->id])}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
@endsection


