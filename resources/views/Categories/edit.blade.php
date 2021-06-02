@extends('layouts.admin')
@section('title')
    <title>Update category</title>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Categories','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('category.update',['id'=>$data->id]) }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Ten thu muc</label>
                  <input type="text" class="form-control " id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ $data->name }}">
                  
                </div>
                <div class="form-group">
                  <label >Thu muc cha</label>
                  <select class="form-control" name="parent_id" >
                    <option value="0">thu muc cha</option>
                    {{!! $categoryOption !!}}
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