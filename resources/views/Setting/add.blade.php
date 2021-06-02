@extends('layouts.admin')
@section('title')
    <title>Setting create</title>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Setting','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('setting.store').'?type='.request()->type }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Config key</label>
                  <input type="text" class="form-control @error('config_key') is-invalid @enderror" id="exampleInputEmail1" name="config_key" aria-describedby="emailHelp" placeholder="config key">
                @error('config_key')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                
                <div class="form-group">
                @if (request()->type === 'text')

                    <label>Config value</label>
                    <input type="text" class="form-control @error('config_value') is-invalid @enderror"  name="config_value"  placeholder="config value">  
                  @else 
                  <label >config value</label>
                  <br>
                  <textarea class="form-group @error('config_value') is-invalid @enderror" name="config_value"  placeholder="config_value" cols="60" rows="5"></textarea>     
                @endif
                @error('config_value')
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