@extends('layouts.admin')
@section('title')
    <title>Singer create</title>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Singer','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('singer.update',['id'=>$dataSinger->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ $dataSinger->name }}" placeholder="ten thu muc">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date and birth</label>
                    <input type="date" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="date_and_birth" aria-describedby="emailHelp" value="{{ $dataSinger->date_and_birth }}" placeholder="date and birth">
                  </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <br>
                    <textarea name="description" id="description" cols="60" rows="5"  class="@error('description') is-invalid @enderror">{{ $dataSinger->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">image</label>
                    <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" id="exampleInputEmail1" name="feature_image_path" aria-describedby="emailHelp" placeholder="ten thu muc">
                  </div>
                  <div class="col-sm-6 mb-3">
                      <img src="{{ $dataSinger->feature_image_path }}" style="width: 300px" alt="">
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