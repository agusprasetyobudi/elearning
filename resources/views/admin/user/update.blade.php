
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
                    <form role="form" action="{{ route('UserManagementUpdatePost',['id' => $user->id])}}" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$user->name}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$user->username}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$user->email}}">
                          </div>
                          {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$user->password}}">
                          </div> --}}
                          <div class="form-group">
                            <label for="exampleInputPassword1">Status User</label>
                            <select name="status_user" id="" class="form-control">
                                <option selected>Pilih Status</option>
                                <option @if($user->status_user == 0) selected @endif value="0">Tidak Aktif</option>
                                <option @if($user->status_user == 1) selected @endif value="1">Aktif</option>
                                <option @if($user->status_user == 2) selected @endif value="2">Suspended</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Alasan</label>
                            <textarea class="form-control" rows="3" name="reason"></textarea>
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <div class="float-right"><a href="{{ route($url, ['id'=>$user->id]) }}" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger">Hapus</a></div>
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
