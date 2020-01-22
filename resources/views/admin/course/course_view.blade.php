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
                <h5 class="card-title">Monthly Recap Report</h5>
                <div class="text-right">
                    <a href="{{ route('CourseCreateAdmin') }}" class="btn btn-default">Create Course</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="1" class="text-center" scope="col">#</th>
                                    <th colspan="3" class="text-center" scope="col">Name Course</th>
                                    <th colspan="2" class="text-center" scope="col">Course Description</th>
                                    <th colspan="2" class="text-center" scope="col">Youtube Url</th>
                                    <th  class="text-center" scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @foreach ($course as $item)
                                    <tr>
                                        {{-- <td colspan="1" class="text-center">{{$item->id}}</td> --}}
                                        <td colspan="1" class="text-center">{{$id++}}</td>
                                        @if ($item->link_video == null && $item->course_single == null)
                                        <td colspan="3" class="text-center"><a href="{{ route('SubCategoryCourse', ['id'=> $item->id]) }}">{{$item->course_name}}</a></td>
                                        @else
                                        <td colspan="3" class="text-center">{{$item->course_name}}</td>
                                        @endif
                                        <td colspan="2" class="text-center">Coba lagi</td>
                                        @if ( $item->link_video != null)
                                        <td colspan="2" class="text-center"> <a href="{{$item->link_video}}">Link Kursus</a> </td>
                                        @else
                                        <td colspan="2" class="text-center">Category</td>
                                        @endif
                                        <td colspan="2" class="text-center">
                                            <a href="#" class="btn btn-warning">Update</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
