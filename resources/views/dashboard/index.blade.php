  @extends('layouts.admin')
  @section('title')
      <title>Admin</title>
  @endsection
  @section('content')
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('partials.content-header',['title'=>'Home','key'=>'Home'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class='col-md-12'>


            <h1>Trang chu</h1>

          </div>


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection