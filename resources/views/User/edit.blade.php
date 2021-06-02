@extends('layouts.admin')
@section('title')
    <title>User create</title>
@endsection
@section('css')
<link href="{{ asset('vendo/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('js')
<script src={{ asset('admins/user/index/js.js') }}></script>
<script src="{{ asset('vendo/select2/select2.min.js') }}"></script>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'User','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('user.update',['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control " id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ $user->name }}" placeholder="ten thu muc">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="email" class="form-control " id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{ $user->email }}" placeholder="ten thu muc">
                  </div>
                  <div class="form-group">
                    <label >Role</label>
                    <select class="form-control role" multiple="multiple" name="optionrole[]">
                        <option value=""></option>
                      @foreach ($dataRole as $dataRoleitem)
                      <option 
                      {{ $roleOfUser->contains('id',$dataRoleitem->id) ? 'selected' : '' }}
                      value="{{ $dataRoleitem->id }}">{{$dataRoleitem->name }}</option>
                      @endforeach

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