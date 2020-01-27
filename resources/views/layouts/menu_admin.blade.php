
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{!! route('DashboardAdmin') !!}" class="brand-link">
    <img src="{{asset('admin/images/CompanyLogos.png')}}"   alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    @if ($company_name)
        @foreach ($company_name as $item)
        <span class="brand-text font-weight-light">{{$item->app_name}}</span>
        @endforeach
    @else
    <span class="brand-text font-weight-light">Company Name</span>
    @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{$name_user}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{URL::to('/')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{route('CourseViewAdmin')}}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Kursus
              {{-- <i class="fas fa-angle-left right"></i> --}}
            </p>
          </a>
          {{-- <ul class="nav nav-treeview">
            @foreach ($collection as $item)
            <li class="nav-item">
              <a href="pages/layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{$item->name}}</p>
              </a>
            </li>
            @endforeach
          </ul> --}}
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            {{-- <i class="nav-icon fas fa-copy"></i> --}}
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              User Management
              {{-- <i class="fas fa-angle-left right"></i> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('UserManagementView')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('RoleManagementView')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{route('PermissionManagmentView')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission</p>
              </a>
            </li> --}}
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('AdminLogout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
