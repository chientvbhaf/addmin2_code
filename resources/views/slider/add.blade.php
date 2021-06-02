@extends('layouts.admin')
@section('title')
    <title>Slide create</title>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Slide','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Ten Slide</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name') }}" placeholder="ten thu muc">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <br>
                    <textarea name="description" id="description" cols="60" rows="5"  class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">image</label>
                    <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" id="exampleInputEmail1" name="image_path" aria-describedby="emailHelp" placeholder="ten thu muc">
                    @error('image_path')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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