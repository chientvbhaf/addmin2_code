@extends('layouts.admin')
@section('title')
    <title>Role create</title>
@endsection
@section('js')
    <script>
      $('.checkbox_wrapper').on('click',function(){
        $(this).parents('.card').find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
      });
      $('.checkbox_all').on('click',function(){
        $(this).parents().find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'));
      })
    </script>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Role','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="{{ route('role.update',['id'=>$role->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Ten</label>
                  <input type="text" class="form-control " id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ $role->name }}" placeholder="ten vai tro">
                </div>
                <div class="form-group col-md-6">
                    <label for="display_name">Mo ta vai tro</label>
                    <br>
                    <textarea name="display_name" id="display_name" cols="60" rows="5"  class="">{{ $role->display_name }}</textarea>
                </div>
                <label>Select features</label>
                <div class="col-cm-3">
                  <div class="row">
                    <div class="card-header">
                      <input type="checkbox" class="checkbox_all">
                      check all
                    </div>
                  </div>

                </div>
                @foreach ($permissionParent as $Parenttitem)
                <div class="card col-md-12">
                  <div class="card-header">
                    <input type="checkbox" class="checkbox_wrapper">
                    {{ $Parenttitem->name }}
                  </div>
                  <div class="card-body">
                      <div class="row">
                        @foreach ($Parenttitem->permissionChildrent as $Childrentitem)
                        <div class="col-md-3">
                          <input {{ $roleOprion->contains('id', $Childrentitem->id) ? 'checked' : '' }} type="checkbox" class="checkbox_childrent"  name="permisstionChildrent[]"  value="{{ $Childrentitem->id }}">
                          {{ $Childrentitem->name }}
                      </div>
                        @endforeach
                       
                      </div>
                   
                  </div>
                </div>
                @endforeach
              
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