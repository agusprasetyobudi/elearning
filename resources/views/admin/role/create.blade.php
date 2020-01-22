
@extends('layouts.adminApp')

@section('sidebar')
    @include('layouts.menu_admin')
@endsection
@section('content')
@include('sweetalert::alert')

     <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"> Add User</h5>
                <div class="text-right">
                    {{-- <a href="{{ route('CourseCreateAdmin') }}" class="btn btn-default">Create Course</a> --}}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12">
                    <form role="form" action="{{ route('RoleManagementInsert')}}" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama User</label>
                            <select name="user_name" class="form-control">
                                @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Role Type</label>
                            <select name="role_type" class="form-control">
                                @foreach ($role as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
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
