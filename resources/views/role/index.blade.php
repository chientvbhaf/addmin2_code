@extends('layouts.admin')
@section('title')
    <title>Roles</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/index/css.css') }}">
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('admins/main/action_delete.js') }}"></script>
@endsection
@section('content')

    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Roles','key'=>'List'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('role.create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class='col-md-12'>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">mo ta vai tro</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->display_name }}</td>
                <td>
                   <a href="{{ route('role.edit',['id'=>$item->id]) }}" class='btn btn-default'>edit</a>
                  <a href=""
                  data-url="{{ route('role.delete',['id'=>$item->id]) }}"
                   class='btn btn-danger action_delete'>delete</a>
                </td>
              </tr> 


               @endforeach
            </tbody>
          </table>
          <div class="col-md-12">
            {{ $data->links() }}
          </div>
        </div>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection