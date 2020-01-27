
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
                    <form role="form" action="{{ route('UserManagementInsert')}}" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Enter Username">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Enter Confirm Password">
                          </div>
                          {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Status User</label>
                            <select name="" id="" class="form-control">
                                <option selected>Baru</option>
                                <option value="">Rubah</option>
                            </select>
                          </div> --}}
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
