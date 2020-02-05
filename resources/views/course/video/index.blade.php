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
                          <h5 class="card-title"> List Video Self Learning</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-12">

                      <div class="row">
                          <div class="col-sm-12">
                            <div class="list-group">
                                @foreach ($course as $item)
                                <a href="{!! route('VideoCourseList',['id'=> $item->id]) !!}" class="list-group-item list-group-item-action">{!! $item->course_name !!}</a>
                                @endforeach
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
          </div>



        <!-- /.row -->
      </div><!--/. container-fluid -->
@endsection


