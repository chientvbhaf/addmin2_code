@extends('layouts.admin')
@section('title')
    <title>Product</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('admins/product/index/list.js') }}"></script>
    <script src="{{ asset('admins/main/action_delete.js') }}"></script>
@endsection

@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'products','key'=>'List'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class='col-md-12'>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Categories</th>
                <th scope="col">User</th>
                <th scope="col">mp3</th>
                <th scope="col">Singer</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td><img class="feature_image" src="{{ $item->feature_image_path }}" alt="icon"></td>
                <td>{{ number_format( $item->price )}}</td>
                <td>{{ optional($item->category)->name }}</td>
                <td>{{ $item->user->name }}</td>
                <td>
                <audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px">
                  <source src="{{ $item->mp3_path }}"
                      type="audio/mpeg">
              </audio>
              </td>
                <td>@foreach ($item->singer as $itemSinger)
                    <p>{{ $itemSinger->name }}</p>
                @endforeach</td>
                <td>
                  {{-- @can('product_update',$item->id ) --}}
                  <a href="{{  route('product.edit',['id'=>$item->id ]) }}" class='btn btn-default'>edit</a>
                  {{-- @endcan --}}
                  <a href="" 
                  data-url="{{ route('product.delete',['id'=>$item->id]) }}" class='btn btn-danger action_delete'>delete</a>
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