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
                    <a href="{{ route('RoleManagementCreate') }}" class="btn btn-default">Create Role</a>
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
                                <th>Type Role</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id= 1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$id++}}</td>
                                @foreach ($item->user as $items)
                                <td>
                                    {{$items->name}}
                                </td>
                                @endforeach
                                @foreach ($item->role as $roles)
                                <td>
                                    {{$roles->name}}
                                </td>
                                @endforeach
                                {{-- <td class="text-center">{!! $item->reason!!}</td> --}}
                                <td class="text-center">
                                    {{-- <a href="{{ route('RoleManagementEdit', ['id'=>$item->user_id]) }}" class="btn btn-info">Update</a> --}}
                                    <a href="{{ route('RoleManagementDelete', ['id'=>$item->user_id]) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Hapus Role</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Sides -->
                    {{-- <div class="float-right">
                        {!!$name_user->links()!!}
                    </div> --}}
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
