@extends('layouts.admin')
@section('title')
    <title>permission create</title>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'permission','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('permission.store') }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">permission name</label>
                  <input type="text" class="form-control " id="exampleInputEmail1" name="name"  placeholder="permission name">
                  
                </div>
                <div class="form-group col-md-6">
                    <label for="display_name">Mo ta vai tro</label>
                    <br>
                    <textarea name="display_name" id="display_name" cols="60" rows="5" class="">{{ old('display_name') }}</textarea>
                </div>
                <div class="form-group">
                  <label >Thu muc cha</label>
                  <select class="form-control" name="parent_id" >
                    <option value="0">thu muc cha</option>
                    {{!! $PermissionOPtion !!}}
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
    
          </div>
      

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection