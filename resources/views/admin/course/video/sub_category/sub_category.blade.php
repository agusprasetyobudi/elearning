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
                <h3 class="card-title font-weight-normal">Detail &nbsp;<h5 class="card-title font-weight-light">{{$name_course}}</h5> </h3>
                <div class="float-right">
                    <a href="{{route('SubCategoryCourseAdd',['id'=> Request::segment(4)])}}" class="btn btn-primary">Add Sub-Course</a>
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
                                        <td colspan="3" class="text-center">{{$item->course_name}}</td>
                                        <td colspan="2" class="text-center">{{$item->description}}</td>
                                        @if ( $item->link_video != null)
                                        <td colspan="2" class="text-center"> <a href="{!! route('VideoCourseDetail',['id'=> $item->id]) !!}" target="_blank">Link Kursus</a> </td>
                                        @else
                                        <td colspan="2" class="text-center">Tidak Ada Link Kursus</td>
                                        @endif
                                        <td colspan="2" class="text-center">
                                            <a href="{!! route('SubCategoryCourseUpdate',['id'=>$item->id]) !!}" class="btn btn-warning">Update</a>
                                            <a href="{!! route('SubCategoryCourseDelete',['id'=>$item->id]) !!}" onclick="return confirm('Apakah anda yakin ?')"  class="btn btn-danger" >Delete</a>
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
