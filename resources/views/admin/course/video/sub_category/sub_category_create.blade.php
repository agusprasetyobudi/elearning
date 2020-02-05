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
            <h5 class="card-title">Add Sub Module Course</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" id="form_main" action='{!! route('SubCategoryCourseInsert',['id'=> Request::segment(5)]) !!}'>
                <div class="row" id="MainCategory">
                        <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body ">
                            {{-- <div class="form-group">
                                <label for="inputName">Course Name</label>
                                <input type="text" name="course_name" id="inputName" class="form-control">
                            </div>
                            <div class="form-group" id="youtube-url">
                                <label for="inputName">Youtube URL</label>
                                <input type="text" name="url_youtube" class="form-control">
                            </div>
                            <div class="form-group" id="course-desc">
                                <label for="inputDescription">Course Description</label>
                                <textarea id="inputDescription" name="courseDescription" class="form-control" rows="4"></textarea>
                            </div> --}}

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Youtube Link</th>
                                        <th>Course Description</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody class="contentSubCategory">
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" name="course_name[]" class="form-control" id=""></td>
                                        <td><input type="text" name="youtube_link[]" class="form-control" id=""></td>
                                        <td><input type="text" name="description[]" class="form-control" id=""></td>
                                        <td> <button type="button" class="btn btn-warning " id="CategoryButton"> Add Module</button></td>
                                    </tr>
                                </tbody>
                            </table>

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
