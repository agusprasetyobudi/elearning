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
                    <a href="{{ route('MateriCourseCreateAdmin') }}" class="btn btn-default">Create Course</a>
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
                                    <th colspan="2" class="text-center" scope="col">Google Docs Url</th>
                                    <th colspan="2" class="text-center" scope="col">Course Status</th>
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
                                        {{-- @if ($item->link_video == null && $item->course_single == null)
                                        <td colspan="3" class="text-center"><a href="{{ route('SubCategoryCourse', ['id'=> $item->id]) }}">{{$item->course_name}}</a></td>
                                        @else --}}
                                        <td colspan="3" class="text-center">{{$item->course_name}}</td>
                                        {{-- @endif --}}
                                        <td colspan="2" class="text-center">{!! str_limit($item->description, 50) !!}</td>
                                        {{-- @if ( $item->link_video != null) --}}
                                        <td colspan="2" class="text-center"> <a href="{!! route('MateriCourseDetail',['id'=> $item->id]) !!}" target="_blank">Link Kursus</a> </td>
                                        {{-- @else
                                        <td colspan="2" class="text-center">Category</td>
                                        @endif --}}
                                        @if ($item->status == 0)
                                        <td class="text-center">
                                            <div class="alert alert-danger"> Tidak Aktif</div>
                                        </td>
                                        @elseif($item->status == 1)
                                        <td class="text-center">
                                            <div class="alert alert-success">Aktif</div>
                                        </td>
                                        @endif
                                        <td colspan="2" class="text-center">
                                            <a href="{!! route('MateriCourseUpdateAdminView',['id'=>$item->id]) !!}" class="btn btn-warning">Update</a>
                                            <a href="{!! route('MateriCourseDeletedAdmin',['id'=>$item->id]) !!}" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger">Delete</a>
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
