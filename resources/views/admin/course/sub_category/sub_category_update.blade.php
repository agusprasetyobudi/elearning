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
            <form method="POST" id="form_main" action='{!! route('SubCategoryCourseUpdateStored') !!}'>
                <div class="row" id="MainCategory">
                        <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body ">
                                <input type="hidden" name="laravel_version" value="{!! $data->id !!}">
                                <div class="form-group">
                                  <label for="">Course Name</label>
                                  <input type="text" class="form-control" name="course_name" aria-describedby="helpId" placeholder="" value="{!! $data->course_name !!}">
                                </div>
                                <div class="form-group" id="youtube-url">
                                  <label for="">Youtube Link</label>
                                  <input type="text" class="form-control" name="youtube_link" id='ytLinkInput' aria-describedby="helpId" placeholder="" value="{!! $data->link_video !!}">
                                </div>
                                <div class="form-group">
                                  <label for="">Description</label>
                                    <textarea class="form-control" name="description" rows="5">{!! $data->description !!}</textarea>
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
