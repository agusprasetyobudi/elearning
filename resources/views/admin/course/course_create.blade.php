@extends('layouts.adminApp')

@section('sidebar')
    @include('layouts.menu_admin')
@endsection
@include('sweetalert::alert')

@section('content')
<div class="container-fluid">
    <!-- Info boxes -->

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Add Course</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" id="form_main" action='{!! route('CourseCreateAdmin',['id'=> Request::segment(4)]) !!}'>
                <div class="row" id="MainCategory">
                        <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body ">
                                <div class="form-group">
                                  <label for="">Course Type</label>
                                  <select class="form-control" name="course_selected" id="course-type">
                                    <option value="1">Course</option>
                                    <option value="2">Sub Course</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Course Name</label>
                                  <input type="text" class="form-control" name="course_name" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group" id="youtube-url">
                                  <label for="">Youtube Link</label>
                                  <input type="text" class="form-control" name="youtube_link" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label for="">Description</label>
                                    <textarea class="form-control" name="description" rows="5"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        </div>

                </div>
                <div class="row">
                        <div class="col-6">
                        <button type="reset" class="btn btn-secondary float-right" id="button-reset">Reset</button>
                        </div>
                        <div class="col-4">
                        @csrf
                        <input type="submit" value="Submit" id="push_course" class="btn btn-success float-left">
                        </div>
                </div>
            </form>
              <!-- /.col -->
            {{-- </div> --}}
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
