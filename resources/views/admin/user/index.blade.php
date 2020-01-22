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
                <h5 class="card-title">User Management</h5>
                <div class="text-right">
                    <a href="{{ route('UserManagementCreate') }}" class="btn btn-default">Create User</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Alasan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id= 1;
                            @endphp
                            @foreach ($user as $item)
                            <tr>
                                <td>{{$id++}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                @if ($item->status_user == 0)
                                <td class="text-center">
                                    <div class="alert alert-danger"> Tidak Aktif</div>
                                </td>
                                @elseif($item->status_user == 1)
                                <td class="text-center">
                                    <div class="alert alert-success">Aktif</div>
                                </td>
                                @else
                                <td class="text-center">
                                    <div class="alert alert-warning">
                                        Suspended
                                    </div>
                                </td>
                                @endif
                                <td class="text-center">{!! $item->reason!!}</td>
                                <td class="text-center">
                                    @if ($item->status_user == 0)
                                    <a href="{{route('UserManagementStatus',['id'=>$item->id])}}" class="btn btn-warning">Re - Aktif</a>
                                    <a href="{{route('UserManagementDelete',['id'=> $item->id])}}" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger">Hapus User</a>
                                    @elseif($item->status_user == 2)
                                    {{-- <a href="#" class="btn btn-danger"></a> --}}
                                    <a href="{{route('UserManagementStatus',['id'=>$item->id])}}" class="btn btn-warning">Re - Aktif</a>
                                    @else
                                    <a href="{{ route('UserManagementUpdateView', ['id'=>$item->id]) }}" class="btn btn-info">Update</a>
                                    <a href="{{ route('UserManagemenetPasswordReset', ['id'=>$item->id]) }}" class="btn btn-warning">Reset Password</a>
                                    @endif
                                </td>
                                {{-- <td>{{}}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {!!$user->links()!!}
                    </div>
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
  <!-- /.content-wrapper -->
