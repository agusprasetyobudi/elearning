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
                  <h4>List Materi Self Learning</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    @foreach ($list_course as $item)
                  <div class="col-xl-4">
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{$item->course_name}}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ str_limit($item->description, 100) }}</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{route('MateriCourseDetail',['id'=> $item->id])}}" class="btn btn-primary">Lihat Materi Kursus</a>
                            </div>
                        </div>
                    </div>

                    <!-- /.chart-responsive -->
                </div>
                @endforeach
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


