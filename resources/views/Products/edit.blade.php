@extends('layouts.admin')
@section('title')
    <title>Product edit</title>
@endsection
@section('css')
<link href="{{ asset('vendo/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Product','key'=>'Edit'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('product.update',['id'=>$data->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Ten product</label>
                  <input type="text" class="form-control " id="exampleInputEmail1" value="{{ $data->name }}"  name="name" aria-describedby="emailHelp" placeholder="ten thu muc">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">price</label>
                  <input type="text" class="form-control " id="exampleInputEmail1" value="{{ $data->price }}"  name="price" aria-describedby="emailHelp" placeholder="ten thu muc">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">mp3</label>
                  <input type="file" class="form-control-file" id="exampleInputEmail1" name="mp3" aria-describedby="emailHelp" >
                </div>
                <div class="col-md-6">
                  <audio controls autoplay>
                    <source src=" {{ $data->mp3_path }} " type="audio/ogg">
                  </audio>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">feature image</label>
                  <input type="file" class="form-control-file" id="exampleInputEmail1" name="feature_image_path" aria-describedby="emailHelp" placeholder="ten thu muc">

                  <div class="col-md-12 image_row">
                      <img class="feature_image" src="{{ $data->feature_image_path }}" alt="icon">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">anh chi tiet</label>
                  <input type="file" class="form-control-file " multiple id="exampleInputEmail1" name="image_path[]" aria-describedby="emailHelp" placeholder="ten thu muc">
                  <div class="col-md-12">
                      <div class="row image_row">
                          @foreach ($data->product_image as $item)
                          <img class="feature_image" src="{{ $item->image_path }}" alt="icon">
                          @endforeach
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label >Category</label>
                    <select class="js-example-placeholder-single js-states form-control " name="category">
                    <option value="0">chon thu muc</option>
                    {{!! $categoryOption !!}}
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">content</label>
                  <textarea class="form-control content-editor" id="exampleFormControlTextarea1" name="content" rows="3">{{ $data->content }}</textarea>
                </div>
                <div class="form-group">
                  <label>tags</label>
                <select class="form-control tags_select2_choose" name="tags[]" multiple="multiple ">
                    @foreach ($data->tags as $item)
                    <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                    @endforeach
                </select>             
                </div>
                <div class="form-group">
                  <label >Singer</label>
                  <select class="form-control chooseSinger" name="chooseSinger[]" multiple="multiple">
                    @foreach ($dataSinger as $itemSinger)
                    <option value="{{ $itemSinger->id }}" {{ $singerSlected->contains('id',$itemSinger->id) ? "selected" : "" }}>{{ $itemSinger->name }}</option>
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
@section('js')

<script src="{{ asset('vendo/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  $(function(){
    $(".chooseSinger").select2({
});
$('.chooseSinger').select2({
  placeholder: 'Enter Singer',
  allowClear: true
});
  })
</script>
@endsection






