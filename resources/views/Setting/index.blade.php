@extends('layouts.admin')
@section('title')
    <title>Setting</title>
@endsection
@section('js')
    <script src="{{ asset("admins/main/action_delete.js") }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Setting','key'=>'List'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-12">
              <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Add
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('setting.create').'?type=text' }}">Text</a>
                  <a class="dropdown-item" href="{{ route('setting.create').'?type=textarea' }}">textarea</a>
                </div>
              </div>
        </div>
        <div class='col-md-12'>
          <table class="table">
            <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">config key</th>
                  <th scope="col">config value</th>
                  <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->config_key }}</td>
                <td>{{ $item->config_value }}</td>
                <td>
                   <a href="{{ route('setting.edit',['id'=> $item->id]) }}" class='btn btn-default'>edit</a>
                  <a href=""
                  data-url="{{ route('setting.delete',['id'=> $item->id]) }}" class='btn btn-danger action_delete'>delete</a>
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