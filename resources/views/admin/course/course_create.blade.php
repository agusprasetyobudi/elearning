@extends('layouts.adminApp')

@section('sidebar')
    @include('layouts.menu_admin')
@endsection
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
                            {{-- <div class="form-group">
                                <button type="button" class="btn btn-warning btn-sm" id="CategoryButton">Sub Category <p class="fa fa-plus fa-sm"></p></button>
                            </div> --}}


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
