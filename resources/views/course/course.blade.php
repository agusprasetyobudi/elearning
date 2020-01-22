@extends('layouts.adminApp')

@section('sidebar')
    @include('layouts.menu_course')
@endsection

@section('content')
     <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              {{-- <div class="card-header">
                        <h5 class="card-title"> Waduhh...😤 Lagi lagi korban malpraktek # Siboen analisa satria Fu</h5>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12">
                    {{-- <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p> --}}

                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <div class="embed-responsive embed-responsive-5by3">
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/p_VQmzgfG6g" frameborder="0"></iframe>
                            </div> --}}
                            @foreach ($company_name as $course)
                             <h3>Welcome To Course {{$course->name}}</h3>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.chart-responsive -->
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


